<?php

namespace App\Http\Controllers;

use App\Feedback;
use App\Tarif;
use App\User;
use App\Client;
use App\Colis;
use App\Incident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function login()
    {
        return view('Home.login');
    }

    public function authLogin(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if(Auth::attempt($credentials)){
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'message' => 'Email ou mot de passe incorrects',
                "label" => "danger"
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login");
    }

    public function dashboard()
    {
        $users = Client::all();
        $colis = Colis::all();
        $feedbacks = Feedback::all();
        $conflits = Incident::all()->where("statut", "==", "Résolu");
        $incidents = Incident::all()->where("statut", "==", "En attente");
        foreach($incidents as $i)
        {
            $i->colis_id = Colis::find($i->colis_id);
            $i->status = Client::find($i->colis_id->client_id);
        }
        return view('Home.dashboard', compact('users', 'colis', 'conflits', 'incidents', 'feedbacks'));
    }

    public function frontEnd()
    {
        Auth::logout();

        $third_tarifs = Tarif::all()->take(3);
        $tarifs = Tarif::all();
        return view("Home.frontEnd", compact('tarifs', "third_tarifs"));
    }

    public function feedback(Request $request)
    {
        $feedback = new Feedback;
        if(isset($request->name))
        {
            $feedback->name = $request->name;
        }
        if(isset($request->subject))
        {
            $feedback->subject = $request->subject;
        }
        $feedback->email = $request->email;
        $feedback->message = $request->message;
        
        if($feedback->save())
        {
            return redirect()->route("front")->withErrors([
                "message" => "Message envoyé",
                "label" => "success"
            ]);
        } else 
        {
            return redirect()->route("front")->withErrors([
                "message" => "Echec d'envoi veuillez reessayer plus tard",
                "label" => "danger"
            ]);
        }
    }

    public function suggestions() 
    {
        $suggestions = Feedback::all()->where("state", "==", "0");
        return view("Home.suggestion", compact("suggestions"));
    }

    public function changeSuggestionState($id)
    {
        $suggestion = Feedback::find($id);
        $suggestion->state = 1;
        $suggestion->save();
        return redirect()->back()->withErrors([
            "message" => "Etat modifié",
            "label" => "success"
        ]);
    }
}
