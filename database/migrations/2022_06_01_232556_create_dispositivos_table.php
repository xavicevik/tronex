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
        Schema::create('dispositivos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('nombre',100);
            $table->string('modelo',100);
            $table->string('serial',100)->nullable(true);
            $table->string('thingname',100);
            $table->boolean('estado');
            $table->boolean('disponibilidad');
            $table->string('GPIO01',20)->nullable(true);
            $table->string('GPIO02',20)->nullable(true);
            $table->string('GPIO03',20)->nullable(true);
            $table->string('GPIO04',20)->nullable(true);
            $table->string('GPIO05',20)->nullable(true);
            $table->string('GPIO06',20)->nullable(true);
            $table->string('GPIO07',20)->nullable(true);
            $table->string('GPIO08',20)->nullable(true);
            $table->string('GPIO09',20)->nullable(true);
            $table->string('GPIO10',20)->nullable(true);
            $table->string('GPIO11',20)->nullable(true);
            $table->string('GPIO12',20)->nullable(true);
            $table->string('GPIO13',20)->nullable(true);
            $table->string('GPIO14',20)->nullable(true);
            $table->string('GPIO15',20)->nullable(true);
            $table->string('GPIO16',20)->nullable(true);
            $table->string('GPIO17',20)->nullable(true);
            $table->string('GPIO18',20)->nullable(true);
            $table->string('GPIO19',20)->nullable(true);
            $table->string('GPIO20',20)->nullable(true);
            $table->string('GPIO21',20)->nullable(true);
            $table->string('GPIO22',20)->nullable(true);
            $table->string('GPIO23',20)->nullable(true);
            $table->string('GPIO24',20)->nullable(true);
            $table->string('GPIO25',20)->nullable(true);
            $table->string('GPIO26',20)->nullable(true);
            $table->string('GPIO27',20)->nullable(true);
            $table->string('AUDIO1',20)->nullable(true);
            $table->string('AUDIO2',20)->nullable(true);
            $table->string('AUDIO3',20)->nullable(true);
            $table->string('AUDIO4',20)->nullable(true);
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
        Schema::dropIfExists('dispositivos');
    }
};
