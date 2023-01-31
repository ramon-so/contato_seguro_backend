<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relatos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('relato');
            $table->integer('usuarios_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('relatos', function($table) {
            $table->foreign('usuarios_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relatos');
    }
};
