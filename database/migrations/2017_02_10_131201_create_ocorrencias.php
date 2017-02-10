<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrencias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('supervisor_id')->unsigned();            
            $table->timestamps();


            $table->foreign('supervisor_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');            
        });


        Schema::create('ocorrencias_ponto', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('setor_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->date('data');
            $table->string('horario');
            $table->string('periodo');
            $table->string('justificativa');
            $table->string('complemento');
            $table->string('situacao');
            $table->timestamps();


            $table->foreign('setor_id')
                    ->references('id')
                    ->on('setores')
                    ->onDelete('cascade');

            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
