<?php

namespace App\Http\Controllers;

use App\Client;
use App\User;
use App\AccountType;
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
        // $clients = User::all();
        $clients = User::where('account_id', 4)->get();
        return view("clients.index", compact("clients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = AccountType::all();
        return view("clients.create",compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (strcmp($request->password, $request->c_password) == 0) {
            $agent = new User;
            $agent->first_name = $request->first_name;
            $agent->last_name = $request->last_name;
            $agent->login = $request->login;
            $agent->account_id = 4;
            $agent->password_eph = $request->c_password;
            $agent->country = $request->country;
            $agent->password = bcrypt($request->password);
            $agent->cni = $request->cni;
            $agent->email = $request->email;
            $agent->phone = $request->phone;
            $agent->address = $request->address;
            if ($agent->save()) {
                return redirect()->route("clients.index")->withSuccess("Le client a bien été créé.");
            } else {
                return back()->withErrors([
                    'message' => 'Echec de l\'enregistrement du nouvel utilisateur',
                ]);
            }
        } else {
            return back()->withErrors([
                'message' => 'Les mots de passe ne coîncident pas',
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
        $user = User::findOrFail($id);
        return view("clients.edit", compact("user"));
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
        if (strcmp($request->password, $request->c_password) == 0) {
            $agent = User::find($id);
            if (isset($request->first_name)) {
                $agent->first_name = $request->first_name;
            }
            if (isset($request->last_name)) {
                $agent->last_name = $request->last_name;
            }
            if (isset($request->login)) {
                $agent->login = $request->login;
            }
            if (isset($request->account_id)) {
                $agent->account_id = $request->account_id;
            }
            if (isset($request->country)) {
                $agent->country = $request->country;
            }
            if (isset($request->cni)) {
                $agent->country = $request->cni;
            }
            if (isset($request->address)) {
                $agent->country = $request->address;
            }
            if (isset($request->phone)) {
                $agent->country = $request->phone;
            }

            $agent->password = bcrypt($request->password);

            if ($agent->save()) {
                return redirect()->route("clients.index")->withErrors([
                    'message' => 'Mis à jour effectuée',
                    "label" => "success"
                ]);
            } else {
                return back()->withErrors([
                    'message' => 'Echec de l\'enregistrement du nouveau client',
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = User::findOrFail($id);
        if($client->colis->count() > 0){
            return back()->withErrors([
                "message" => "Le client ne peut être supprimé car possède des colis."
            ]);
        }
        $client->delete();
        return back()->withSuccess("Le client a été supprimé avec succès.");
    }
}
