<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Entidade;

/* 
    Getters para Atributos com _ são escritos com CamelCase
    Atributos com underline devem ser retornados com $this->attributes, 
    caso contrario darão 'Undefined Property'
*/

class Turma extends Entidade
{
    protected $fillable = [ 'nome', 'horario_inicio', 'horario_termino', 'updatedby_id' ];

    public function getHorarioInicioAttribute() {
        return date_create_from_format('H:i:s', $this->attributes['horario_inicio'])
            ->format('H:i');
    }

    public function getHorarioTerminoAttribute() {
        return date_create_from_format('H:i:s', $this->attributes['horario_termino'])
        ->format('H:i');
    }
}
