<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tarif;

class TarifsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifs = Tarif::all();
        return view("tarifs.index", compact("tarifs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tarifs.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarif = new Tarif();
        $tarif->libelle = $request->libelle;
        $tarif->montant = $request->montant;
        $tarif->save();

        return back()->withSuccess("Le tarif a bien été créé.");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarif = Tarif::findOrFail($id);
        return view("tarifs.edit", compact("tarif"));
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
        $tarif = Tarif::findOrfail($id);
        $tarif->libelle = $request->libelle;
        $tarif->montant = $request->montant;
        $tarif->save();

        return back()->withSuccess("Le tarif a bien été mis à jour.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarif = Tarif::findOrFail($id);
        $tarif->delete();

        return back()->withSuccess("Le tarif a bien été supprimé.");
    }
}
