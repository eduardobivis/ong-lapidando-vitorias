<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('email', 100);
            $table->string('telefone', 20);
            $table->string('celular', 20);
            $table->string('rg', 20);
            $table->string('cpf', 20);
            $table->unsignedInteger('situacao_id');
            $table->string('observacao', 200)->nullable();
            $table->string('rua', 100);
            $table->string('numero', 10);
            $table->string('complemento', 200)->nullable();
            $table->string('bairro', 100);
            $table->unsignedInteger('cidade_id');
            $table->char('estado', 2);
            $table->string('codigo_acesso', 200);
            $table->char('dia_pagamento', 2);
            $table->date('data_matricula');
            $table->unsignedInteger('createdby_id');
            $table->unsignedInteger('updatedby_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('situacao_id')->references('id')->on('situacoes');
            $table->foreign('cidade_id')->references('id')->on('cidades');
            $table->foreign('createdby_id')->references('id')->on('users');
            $table->foreign('updatedby_id')->references('id')->on('users');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
