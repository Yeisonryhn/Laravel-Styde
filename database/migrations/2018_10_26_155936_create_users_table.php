<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //esta funcion es la que crea la tabla de usuarios
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('profession_id');
            $table->foreign('profession_id')->references('id')->on('professions');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        //en caso de error 1071 Para las personas que lleguen a tener el error de "Syntax error or access violation: 1071 Specified key was too long...." una forma de solucionarlo es yendo al archivo "AppServiceProvider.php" ubicado en "mi-proyecto/app/providers/AppServiceProvider.php" lo que tienen que hacer es incluir al principio del archivo "use Illuminate\Support\Facades\Schema;" y en la funcion llamada "boot" incluir "Schema::defaultStringLength(191);".  Al final guardan el archivo y vuelven a ejecutar el comando  php artisan migrate﻿

        /*
            COMANDOS DE PHP ARTISAN MIGRATE
                php artisan migrate:reset----------------------------------------------- 
                Este devuelve todas las migraciones en orden inverso

                php artisan migrate:refresh---------------------------------------------
                Este comando devuelve todas las migraciones y luego ejecuta todas las migraciones, es decir, primero ejecuta el metodo down y luego ejecuta el metodo up de todas las tablas.
                ESTOS DOS COMANDOS SUELEN SER DESTRUCTIVOS, YA QUE ELIMINAN TODA LA ESTRUCTURA DE LA BASE DE DATOS

                para solucionar esto es recomendable que para hacer modificaciones en la estructura de una base de datos en produccion se creen nuevas migraciones.

                php artisan migrate:rollback--------------------------------------------
                Devuelve el ultimo lote de migracion ejecutado

                php artisan migrate:fresh




        */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //esta funcion elimina la tabla de usuarios

        Schema::dropIfExists('users');
    }
}
