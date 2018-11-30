<?php

use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;// OJOOOOOOOO, ES NECESARIO IMPORTAR ESTA CLASE PARA USAR LA CLASE DB EN LA FUNCTION RUN
use \App\Profession;
class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::statement('SET FOREIGN_KEY_CHECKS = 0');//CON ESTA LINEA DE CODIGO SE DESACTIVA EL CHEQUEO DE CLAVE FORANEA

    	DB::table('professions')->truncate();//ESTE METODO ES PARA ELIMINAR TODOS LOS REGISTROS DE LA TABLA ANTES DE EJECUTAR LOS SEEDERS, PERO PARA PODER EJECUTARLO ES NECESARIO DESACTIVAR LA REVISION DE CLAVES FORANEAS, HAY QUE ANALIZAR BIEN PARA SABER SI NOS SIRVE O NO EN EL PROYECTO

    	DB::statement('SET FOREIGN_KEY_CHECKS = 1');//ESTA LINEA PARA ACTIVARLAS
    	//EN EL CASO QUE SE DESEE ELIMINAR VARIAS TABLAS, ESTAS TRES LINEAS DE CODIGO SE PUEDEN MOVER A DatabaseSeeder

        DB::table('professions')->insert([
        	'title' => 'Desarrollador Back-End',

        ]);

        DB::table('professions')->insert([
        	'title' => 'Desarrollador Front-End',

        ]);

        DB::table('professions')->insert([
        	'title' => 'Diseñador Web',

        ]);

        DB::table('professions')->insert([
        	'title' => 'Diseñador de Videojuegos',

        ]);

        //aqui usaremos el model factory
        factory(Profession::class,5)->create();


        /*
            Tambien se pueden ingresar datos con los modelos de laravel de la siguiente manera
            1 Crear el modelo con el comando php artisan make:model Profession (se guardan en la carpeta app) revisarlo
            2.
        */

        //---------------------------------------------------------------------------------------------------    
        Profession::create([//-------------------------------------------------------------------------------
            'title' => 'Modelador 3D',//---------------------------------------------------------------------
        ]);//------------------------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------------------------

        /*
			LOS SEEDERS SE USAN PARA INGRESAR DATA DE PRUEBA A LA BASE DE DATOS DE LA APLICACION, SE EJECUTAN POR MEDIO DEL COMANDO

			php artisan db:seed

			CADA SEEDER DEBE SER AGREGADO EN EL ARCHIVO DatabaseSeeder.php
        */
    }
}
