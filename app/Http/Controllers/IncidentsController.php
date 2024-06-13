<?php

namespace App\Http\Controllers;

use App\Colis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Incident;
use Barryvdh\DomPDF\Facade as PDF;

class IncidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incidents = Incident::where("message",1)->get();
        return view("incidents.index", compact("incidents"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $colis = Colis::all();
        return view("incidents.create", compact("colis"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $incident = new Incident();
        $incident->motif = request("motif");
        $incident->colis_id = request("colis_id");
        $incident->titre = request("titre");
        if( auth()->user()->accountType->code == "CLT"){
        $incident->message = 0;
        }else{
            $incident->message = 1;   
        }
        try{

            $incident->save();
            return back()->withSuccess("Envoyé avec succès.");

        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }

    public function generateLetter($id){
        $incident = Incident::with("coli.user")->findOrFail($id);
        if($incident->statut == "En attente") return back()->withErrors([
            "message" => "Le conflit doit être marqué comme résolu."
        ]);
        return view('incidents.letter', ["incident" => $incident]);
        // $pdf = PDF::loadView('incidents.letter', ["incident" => $incident]);
        // return $pdf->stream('invoice.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colis = Colis::all();
        $incident = Incident::findOrFail($id);
        return view("incidents.edit", compact("incident", "colis"));
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
        $incident = Incident::findOrFail($id);
        $incident->motif = request("motif");
        $incident->colis_id = request("colis_id");
        $incident->titre = request("titre");

        try{

            $incident->save();
            return back()->withSuccess("Le conflit a été mis à jour avec succès.");

        }catch(Exception $e){
            Log::error($e->getMessage());
            return back()->withErrors([
                "message" => "Une erreur est survenue, veuillez réessayer s'il vous plait."
            ]);
        }
    }

    public function resolve($id){
        $incident = Incident::findOrFail($id);
        $incident->statut = "Résolu";
        $incident->save();
        return back()->withSuccess("Le conflit a bien été marqué comme résolu.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incident = Incident::findOrFail($id);
        $incident->delete();

        return back()->withSuccess("L'incident a bien été supprimé.");
    }
}
