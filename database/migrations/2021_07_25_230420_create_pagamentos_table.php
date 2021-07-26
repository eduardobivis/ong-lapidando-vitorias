<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamentos', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->timestamps();
            $table->unsignedInteger('aluno_id');
            $table->date('data');
            $table->unsignedInteger('createdby_id');
            $table->unsignedInteger('updatedby_id');
            $table->softDeletes();

            $table->foreign('aluno_id')->references('id')->on('alunos');
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
        Schema::dropIfExists('pagamentos');
    }
}
