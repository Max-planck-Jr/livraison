<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Colis extends Model
{
    protected $fillable = ["user_id", "nature", "contenance", "nom", "quantite", "fragilite", "valeur_euro", "poids", "longueur", "hauteur", "largeur", "moyen_envoi", "country", "date_arrivee", "tarif_id", "receiver_id","who"];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function receiver(){
        return $this->belongsTo(User::class, "receiver_id");
    }
}
