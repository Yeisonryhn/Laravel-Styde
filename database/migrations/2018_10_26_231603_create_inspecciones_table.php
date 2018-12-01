<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa')->unique()->nullable($value=false);
            $table->string('marca');
            $table->string('modelo');
            $table->integer('año');
            $table->string('estado_carro',200);
            $table->date('fecha');            
            $table->integer('propietario_cedula')->references('cedula')->on('propietarios');
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
        Schema::dropIfExists('inspecciones');
    }
}
