<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunoTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_turmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('aluno_id');
            $table->unsignedInteger('turma_id');
            $table->unsignedInteger('createdby_id');
            $table->unsignedInteger('updatedby_id');
            $table->softDeletes();
            $table->timestamps();

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
        Schema::dropIfExists('aluno_turmas');
    }
}
