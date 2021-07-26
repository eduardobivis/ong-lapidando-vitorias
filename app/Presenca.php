<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Helper;
use App\Entidade;

use App\Aluno;
use App\Turma;

class Presenca extends Entidade
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [ 
        'aluno_id', 
        'data', 
        'horario', 
        'turma_id', 
        'justificativa',
        'createdby_id',
        'updatedby_id'
    ];

    //Relações
    public function aluno () {
        return $this->belongsTo(Aluno::class);
    }
    public function turma () {
        return $this->belongsTo(Turma::class);
    }

    //Atributos Formatados
    public function getDataFormatadoAttribute () {
        return Helper::formataData($this->data);
    }

    public function getHorarioFormatadoAttribute () {
        return Helper::formataHorario($this->horario);
    }
}

