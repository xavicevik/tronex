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
        Schema::create('programas', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->foreignId('idkamara')->unsigned();
            $table->foreign('idkamara')->references('id')->on('kamaras');
            $table->boolean('estado')->default(true);
            $table->foreignId('idusuario')->unsigned();
            $table->foreign('idusuario')->references('id')->on('users');
            $table->foreignId('idcreador')->unsigned();
            $table->foreign('idcreador')->references('id')->on('users');
            $table->integer('pasos')->default(0);
            $table->json('rutina');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programas');
    }
};
