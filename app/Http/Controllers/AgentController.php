<?php

namespace App\Http\Controllers;

use App\AccountType;
use App\User;
use Illuminate\Http\Request;
use Alert;

class AgentController extends Controller
{
    public function index()
    {
        $agents = User::paginate(5);
        foreach($agents as $agent){
            $agent->account_id = AccountType::find($agent->account_id)->label;
        }
        return view("agents.index", compact("agents"));
    }

    public function create()
    {
        $accounts = AccountType::all();
        return view('agents.create', compact('accounts'));
    }

    public function store(Request $request)
    {
        if(strcmp($request->password, $request->c_password) == 0){
            $agent = new User;
            $agent->first_name = $request->first_name;
            $agent->last_name = $request->last_name;
            $agent->login = $request->login;
            $agent->account_id = $request->account_id;
            $agent->country = $request->country;
            $agent->password = bcrypt($agent->password);
            if($agent->save()){
                return redirect()->route("agents")->withErrors([
                    "message" => "Utilisateur créé",
                    "label" => "success"
                ]);
            } else {
                return back()->withErrors([
                    'message' => 'Echec de l\'enregistrement du nouvel agent',
                    "label" => "danger"
                ]);
            }
        } else {
            return back()->withErrors([
                'message' => 'Les mots de passe ne coîncident pas',
                "label" => "danger"
            ]);
        }
    }

    public function edit($id) 
    {
        $user = User::find($id);
        $accounts = AccountType::all();
        return view("agents.edit", compact("user", "accounts"));
    }

    public function update(Request $request, $id)
    {
        if(strcmp($request->password, $request->c_password) == 0){
            $agent = User::find($id);
            if(isset($request->first_name))
            {
                $agent->first_name = $request->first_name;
            }
            if(isset($request->last_name))
            {
                $agent->last_name = $request->last_name;
            }
            if(isset($request->login))
            {
                $agent->login = $request->login;
            }
            if(isset($request->account_id))
            {
                $agent->account_id = $request->account_id;
            }
            if(isset($request->country))
            {
                $agent->country = $request->country;
            }
            if(isset($request->password))
            {
                $agent->password = bcrypt($agent->password);
            }
            
            if($agent->save()){
                return redirect()->route("agents")->withErrors([
                    'message' => 'Mis à jour effectuée',
                    "label" => "success"
                ]);
            } else {
                return back()->withErrors([
                    'message' => 'Echec de l\'enregistrement du nouvel agent',
                    "label" => "danger"
                ]);
            }
        } else {
            return back()->withErrors([
                'message' => 'Les mots de passe ne coîncident pas',
                "label" => "danger"
            ]);
        }
    }

    public function destroy($id) {
        if ( auth()->user()->id == $id ) {
            return redirect()->back()->withErrors([
                "message" => "Vous ne pouvez pas supprimé votre compte",
                "label" => "danger"
            ]);
        }
        if(User::findOrFail($id)->delete() ) {
            return redirect()->back()->withErrors([
                "message" => "Suppression effectuée",
                "label" => "success"
            ]);
        } 
        return redirect()->back()->withErrors([
            "message" => "Erreur lors de la suppression",
            "label" => "danger"
        ]);
    }
}
