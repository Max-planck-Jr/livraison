<?php

namespace App\Http\Controllers;

use App\Client;
use App\Mail\ColisMail;
use App\Mail\Colis2Mail;
use App\Colis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tarif;
use App\User;
use App\AccountType;
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
        // $colis = Colis::where("country", auth()->user()->country)->get();
        // $colis = Colis::with('user')->get();
        if(auth()->user()->accountType->code != "ADM" ){
        $colis = Colis::with('user')
              ->where("who", auth()->user()->id)
              ->get();
        return view("colis.index", compact("colis"));
        }
        $colis = Colis::all();
        return view("colis.index", compact("colis"));
    }

    public function tracer()
    {
        $colis = Colis::where("user_id", auth()->user()->id)
              ->get();
            //   $id =  auth()->user()->id;
            //   dd($colis);
        return view("colis.tracer", compact("colis"));
    }

    public function withdrawal(){
        $colis = Colis::where("country", "=", auth()->user()->accountType->id)->get();
        return view("colis.withdrawal", compact("colis"));
    }

    public function remove($id){
        $colis = Colis::findOrFail($id);
        if($colis->statut == "En attente") return back()->withErrors([
            "message" => "Vous ne pouvez pas retirer un colis en attente de paiement."
        ]);
        $month = Carbon::now()->month;
        $formattedDate = Carbon::now()->format('d/m/y');
        $colis->statut = "Retiré";
        $details = [
            'title' => 'Votre colis a été livré avec succès',
            'body' => 'Nous somme ravi d avoir traité avec vous, nous espérons vous revoir bientot',
            'colis1' => $colis->user->first_name,
            'colis2' => $colis->user->last_name,
        ];
        $colis->save();
        Mail::to($colis->user->email)->send(new Colis2Mail($details));
        
        return view('colis.withdrawal_invoice_double', ["colis" => $colis, "formattedDate" => $formattedDate]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $clients = User::all();
        $clients = User::where('account_id', 4)->get();
        $tarifs = Tarif::all();
        $accountTypes = AccountType::all();
        return view("colis.create", compact("clients", "tarifs", "accountTypes"));
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
            "user_id" => "required",
            "receiver_id" => "required",
        ]);

        if($request->user_id == $request->receiver_id) return back()->withErrors([
            "message" => "Le client ne peut s'envoyer de colis à lui même."
        ]);

        $colis = new Colis();
        $colis->country = auth()->user()->country;
        $colis->date_entree = Carbon::today();
        $colis->longueur = $request->longueur;
        $colis->hauteur = $request->hauteur;
        $colis->poids = $request->poids;
        $colis->largeur = $request->largeur;
        $colis->who = auth()->user()->id;
        //dd($colis->valeur_euro);
        $colis->fill($request->all());
        $colis->valeur_euro = (($colis->longueur * $colis->hauteur * $colis->largeur) / 5000) * 30;
        $details = [
            'title' => 'Votre colis est en cours de traitement',
            'body' => 'Nous somme ravi d avoir traité avec vous, nous espérons vous revoir bientot',
            'colis' => $colis->date_entree
        ];

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $clients = User::all();
        $colis = Colis::with("user")->findOrFail($id);
        $tarifs = Tarif::all();
        return view("colis.show", compact("colis", "clients", "tarifs"));
    }


    public function send($id){
        $colis = Colis::findOrFail($id);
        $colis->statut = "Envoyé";

        $details = [
            'title' => 'Votre colis est en cours de traitement',
            'body' => 'Nous somme ravi d avoir traité avec vous, nous espérons vous revoir bientot',
            'colis1' => $colis->receiver->first_name,
            'colis2' => $colis->receiver->last_name,
            'colis11' => $colis->user->first_name,
            'colis22' => $colis->user->last_name,
            'colis5' => $colis->user->address,
            'colis6' => $colis->user->country,
            'colis3' => $colis->nom,
            'colis4' => $colis->contenance,
            'colis7' => $colis->receiver->login,
            'colis8' => $colis->receiver->password_eph,
            'colis9' => $colis->date_arrivee,
        ];
        $colis->save();
        // Send email
        Mail::to($colis->receiver->email)->send(new ColisMail($details));

        $colis->receiver->password_eph = "";

        $month = Carbon::now();
        $formattedDate = Carbon::now()->format('d/m/y');

        return view('colis.deposit_invoice_double', ["colis" => $colis, "formattedDate" => $formattedDate]);

        // $pdf = PDF::loadView('colis.deposit_invoice', ["colis" => $colis, "month" => $month]);
        // return $pdf->stream('colis.pdf');
        //return back()->withSuccess("Le colis a bien été envoyé.");
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
        $clients = User::all();
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

        if($colis->count() > 0){
            return redirect()->back()->withErrors([
                "message" => "Le colis ne peut être supprimé car possède un incident."
            ]);
        }
        $colis->delete();

        return back()->withSuccess("Le colis a été supprimé avec succès.");
    }
}
