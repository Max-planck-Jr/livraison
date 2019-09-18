<?php

namespace App\Http\Controllers;

use App\Client;
use App\Colis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tarif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class ColisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colis = Colis::where("country", auth()->user()->country)->get();
        return view("colis.index", compact("colis"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $tarifs = Tarif::all();
        return view("colis.create", compact("clients", "tarifs"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "client_id" => "required"
        ]);

        $colis = new Colis();
        $colis->country = auth()->user()->country;
        $colis->date_entree = Carbon::today();
        $colis->fill($request->all());

        try{
            $colis->save();

            $isReceived = Colis::where("client_id", $colis->id)->where("statut", "Envoyé")->where("country", "!=", auth()->user()->country)->where("nom", $colis->nom)->fisrt() != null;
            if($isReceived){
                Mail::raw('Bonjour monsieur, votre colis est arrivé à destination.', function ($message) use($request, $colis) {
                    $message->from('support@zedlogistics.com', 'Support');
                    $message->to($colis->client->email, $colis->client->firstName." ".$colis->client->lastName);
                });
            }

            return back()->withSuccess("Le colis a enregistré avec succès.");

        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = Client::all();
        $colis = Colis::with("client")->findOrFail($id);
        $tarifs = Tarif::all();
        return view("colis.show", compact("colis", "clients", "tarifs"));
    }

    public function send($id){
        $colis = Colis::findOrFail($id);
        $colis->statut = "Envoyé";
        $colis->save();

        return back()->withSuccess("Le colis a bien été envoyé.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colis = Colis::findOrFail($id);
        $clients = Client::all();
        $tarifs = Tarif::all();

        return view("colis.edit", compact("colis", "clients", "tarifs"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "client_id" => "required"
        ]);

        $colis = Colis::findOrFail($id);
        $colis->country = auth()->user()->country;
        $colis->date_entree = Carbon::today();
        $colis->fill($request->all());

        try{

            $colis->save();
            return back()->withSuccess("Le colis a enregistré avec succès.");

        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colis = Colis::findOrFail($id);
        $colis->delete();

        return back()->withSuccess("Le colis a été supprimé avec succès.");
    }
}
