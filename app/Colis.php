<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Colis extends Model
{
    protected $fillable = ["client_id", "nature", "contenance", "nom", "quantite", "valeur_euro", "poids", "moyen_envoi", "country", "date_arrivee", "tarif_id", "receiver_id"];
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function receiver(){
        return $this->belongsTo(Client::class, "receiver_id");
    }
}
