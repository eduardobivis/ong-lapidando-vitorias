<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use SoftDeletes;
use Helper;

use App\User;

abstract class Entidade extends Model
{

    //Relações
    public function createdby () {
        return $this->belongsTo(User::class);
    }
    public function updatedby () {
        return $this->belongsTo(User::class);
    }
}