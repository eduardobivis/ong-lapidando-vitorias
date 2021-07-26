<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresencasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presencas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('aluno_id');
            $table->date('data');
            $table->time('horario');
            $table->unsignedInteger('turma_id');
            $table->string('justificativa', 200)->nullable();
            $table->unsignedInteger('createdby_id');
            $table->unsignedInteger('updatedby_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('aluno_id')->references('id')->on('alunos');
            $table->foreign('turma_id')->references('id')->on('turmas');
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
        Schema::dropIfExists('presencas');
    }
}
