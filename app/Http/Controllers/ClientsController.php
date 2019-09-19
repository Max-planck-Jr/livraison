<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view("clients.index", compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clients.create");
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
            "firstName" => "required",
            "lastName"  => "required",
            "email"     => "email|required",
            "phone"     => "required"
        ]);

        $client = new Client();
        $client->fill($request->all());

        try{

            $client->save();
            return back()->withSuccess("Le client a été enregistré avec succès.");

        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view("clients.edit", compact("client"));
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
            "firstName" => "required",
            "lastName"  => "required",
            "email"     => "email|required",
            "phone"     => "required"
        ]);

        $client = Client::findOrFail($id);
        $client->fill($request->all());

        try{

            $client->save();
            return back()->withSuccess("Le client a été mis à jour avec succès.");

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
        $client = Client::findOrFail($id);
        if($client->colis->count() > 0){
            return back()->withErrors([
                "message" => "Le client ne peut être supprimé car possède des colis."
            ]);
        }
        $client->delete();
        return back()->withSuccess("Le client a été supprimé avec succès.");
    }
}
