<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ["firstName", "lastName", "email", "phone", "gender", "cni", "adress"];

    public function colis(){
        return $this->hasMany(Colis::class);
    }
}
