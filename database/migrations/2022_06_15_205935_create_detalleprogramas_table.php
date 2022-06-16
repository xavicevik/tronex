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
        Schema::create('detalleprogramas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('idprograma')->unsigned();
            $table->foreign('idprograma')->references('id')->on('programas');
            $table->integer('consecutivo');
            $table->string('puerto', 50);
            $table->string('accion', 50);
            $table->string('duracion', 50);
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
        Schema::dropIfExists('detalleprogramas');
    }
};
