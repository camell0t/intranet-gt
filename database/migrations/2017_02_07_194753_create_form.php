<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('formulario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('corpo');
                  
            $table->timestamps();
        });

        Schema::create('envios_formulario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('formulario_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('mensagem');
            $table->string('anexo');


            $table->foreign('formulario_id')
                    ->references('id')
                    ->on('enquete')
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
