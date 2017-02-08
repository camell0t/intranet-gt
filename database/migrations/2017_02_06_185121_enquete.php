<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Enquete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('enquete', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('pergunta');
            $table->string('opcao1', 100);
            $table->string('opcao2', 100);
            $table->string('opcao3', 100);
            $table->string('opcao4', 100);
            $table->string('opcao5', 100);
            $table->string('opcao6', 100);
            $table->string('opcao7', 100);
            $table->string('opcao8', 100);
            $table->string('opcao9', 100);
            $table->string('opcao10', 100);
            $table->timestamps();
        });

        Schema::create('respostas_enquete', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enquete_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('enquete_id')
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
