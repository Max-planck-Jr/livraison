<?php

namespace App\Http\Controllers;

use App\Client;
use App\Colis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tarif;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade as PDF;

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

    public function withdrawal(){
        $colis = Colis::where("country", "!=", auth()->user()->country)->get();
        return view("colis.withdrawal", compact("colis"));
    }

    public function remove($id){
        $colis = Colis::findOrFail($id);
        if($colis->statut == "En attente") return back()->withErrors([
            "message" => "Vous ne pouvez pas retirer un colis en attente de paiement."
        ]);
        $month = Carbon::now()->month;
        $colis->statut = "Retiré";
        $colis->save();
        /*Mail::raw('Bonjour monsieur, votre colis est arrivé à destination.', function ($message) use($colis) {
            $message->from('support@zedlogistics.com', 'Support');
            $message->to($colis->client->email, $colis->client->firstName." ".$colis->client->lastName);
        });*/
        $pdf = PDF::loadView('colis.withdrawal_invoice', ["colis" => $colis, "month" => $month]);
        return $pdf->stream('colis.pdf');
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
            "client_id" => "required",
            "receiver_id" => "required",
        ]);

        if($request->client_id == $request->receiver_id) return back()->withErrors([
            "message" => "Le client ne peut s'envoyer de colis à lui même."
        ]);

        $colis = new Colis();
        $colis->country = auth()->user()->country;
        $colis->date_entree = Carbon::today();
        $colis->fill($request->all());

        try{
            $colis->save();

            $month = Carbon::now()->month;

            $pdf = PDF::loadView('colis.deposit_invoice', ["colis" => $colis, "month" => $month]);
            return $pdf->stream('colis.pdf');
            //return back()->withSuccess("Le colis a enregistré avec succès.");

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
