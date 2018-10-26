<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*seleccionar el id de una profesion por medio de consultas SQL.
        OJOOOOOOOOO ESTA NO ES LA FORMA MAS SEGURA-----------------------------------------------------------
        $professions = DB::select('SELECT id FROM professions WHERE title = "Desarrollador Back-End"');
        ------------------------------------------------------------------------------------------------------
        */

        /*seleccionar el id de una profesion por medio de consultas SQL.
         OJOOOOOOOOO ESTA FORMA ES MAS SEGURA QUE LA ANTERIOR-----------------------------------------------   
        $professions = DB::select('SELECT id FROM professions WHERE title = ? LIMIT 0,1 ',['Desarrollador Back-End']);
        -------------------------------------------------------------------------------------------------------
        */

        /*AHORA SELECCIONAR EL ID DE UNA PROFESION POR MEDIO DEL CONSTRUCTOR DE CONSULTAS DE LARAVEL
        ESTE ES EL METODO MAS SEGURO
        */

        $profession = DB::table('professions')->select('id')->where('title', '=', 'Desarrollador Back-End')->first();
        //dd($professions->first()->id);//Para mostrar el resultado de la consulta en consola. 

        DB::table('users')->insert([
            
            'name'=>'Yeison Fuentes',
            'email'=>'Yeison@Fuentes',
            'password'=>bcrypt('laravel'),
            'profession_id' => $profession->id,
            

        ]);
    }
}
