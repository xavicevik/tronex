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
        Schema::create('kamaras', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nombre', 100);
            $table->integer('idubicacion')->unsigned();
            $table->foreign('idubicacion')->references('id')->on('ubicaciones');
            $table->foreignId('iddispositivo')->unsigned();
            $table->foreign('iddispositivo')->references('id')->on('dispositivos');
            $table->boolean('estado');
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
        Schema::dropIfExists('kamaras');
    }
};
