<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    public function coli(){
        return $this->belongsTo(Colis::class, "colis_id");
    }
}
