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

    //Atributos
    public function getCreatedAtDateAttribute() {
        return Helper::formataData($this->created_at, true);
    }

    public function getCreatedAtTimeAttribute() {
        return Helper::formataHorario($this->created_at, true);
    }

    public function getUpdatedAtDateAttribute() {
        return Helper::formataData($this->updated_at, true);
    }

    public function getUpdatedAtTimeAttribute() {
        return Helper::formataHorario($this->updated_at, true);
    }
}