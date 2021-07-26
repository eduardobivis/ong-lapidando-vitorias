<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 50);
            $table->time('horario_inicio')->nullable();
            $table->time('horario_termino')->nullable();
            $table->unsignedInteger('updatedby_id');
            $table->timestamps();

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
        Schema::dropIfExists('turmas');
    }
}
