<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    public $timestamps = false;
    //protected $table = "account_type";
    protected $fillable = [
        "label"
    ];
}
