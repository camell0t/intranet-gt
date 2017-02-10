<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContracheque extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracheque', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('envio_user_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('mime');
            $table->string('path');
            $table->timestamps();


            $table->foreign('envio_user_id')
                    ->references('id')
                    ->on('users')
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
