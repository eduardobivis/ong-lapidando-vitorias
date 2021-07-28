<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Helper;

use App\AlunoTurma;
use App\Entidade;
use App\Cidade;
use App\Pagamento;
use App\Presenca;
use App\Situacao;
use App\Turma;

class Aluno extends Entidade
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [ 
        'nome', 
        'email', 
        'telefone', 
        'celular',
        'rg',
        'cpf',
        'situacao_id',
        'observacao',
        'rua',
        'numero',
        'bairro',
        'complemento',
        'cidade_id',
        'estado',
        'codigo_acesso',
        'dia_pagamento',
        'data_matricula',
        'createdby_id',
        'updatedby_id'
    ];

    //Relações
    public function situacao () {
        return $this->belongsTo(Situacao::class);
    }

    public function turmas() {
        return $this->hasMany(AlunoTurma::class);
    }

    public function getTurmasStringAttribute() {
        $tableName = (new AlunoTurma)->getTable();
        $registros = 
            $this
                ->belongsToMany(Turma::class, $tableName)
                ->get(['nome']);
        $ret = "";
        foreach ($registros as $registro) $ret .= $registro->nome.', ';
        return substr($ret, 0, -2);
    }
    public function cidade () {
        return $this->belongsTo(Cidade::class);
    }

    public function presencas() {
        return $this->hasMany(Presenca::class)->whereYear('data', date('Y'));
    }

    public function pagamentos() {
        return $this->hasMany(Pagamento::class);
    }
}