<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Profession;
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
        //CONSULTAS UTILIZANDO UN MODELO DE LARAVEL------------------------------------------------------
        //$profession = Profession::select('id')->where('title', '=', 'Modelador 3D')->first();
        //o tambien asi
        $profession = Profession::where('title', 'Desarrollador Back-End')->value('id');
        //USUARIO CREADO CON UN MODELO DE LARAVEL--------------------------------------------------------        
        User::create([
            'name'=>'Rahisbel Herrera',
            'email'=>'Rahisbel@Herrera',
            'password'=>bcrypt('laravel2'),
            'profession_id' => $profession,
        ]);

        $profession = Profession::where('title', 'Modelador 3D')->value('id');
        User::create([
            'name'=>'DAvid Chacon',
            'email'=>'david@chacon',
            'password'=>bcrypt('laravel3'),
            'profession_id' => $profession,
        ]);
        /*Lo siguiente se llama model factory, se usa para crear registros automaticamente, para no tener
        que hacer lo que tenemos arriba*/
        factory(User::class)->create();//Tambien se pueden crear datos de esta manera
        factory(User::class)->create();
        factory(User::class)->create();
        //si se desea  agregar usuarios, pero ademas agregar su profesion(clave foránea), se hace lo siguiente
        factory(User::class)->create(['profession_id'=>$profession]);//se le pasa un array asociativo con el dato a sobreescribir
        factory(User::class,10)->create();//crea 10 usuarios mas
        /*Si quisieramos hacer lo mismo con la clase profession habria que crearle el model factory de profession, desde la terminal con el 
        comando php artisan make: factory  ProfessionFactory, termina en factory para continuar la convencion que tiene laravel por defecto
        tambien se pueden crear de la siguiente manera php artisan make:factory ProfessionFactory --model=Profession
        para tener mas informacion de los metodos que tiene php artisan make:factory se puede ejecutar el comando php artisan help make:factory
        y asi con cualquier metodo*/

        //tambien se puede crear un modelo con un migracion y su factory, ejecutar php artisan help make:model para mas informacion

        //ojo se creó el modelo skill con su migracion y factory de la siguiente manera php artisan make:model -mf Skill
      

        
        /*NOTA: al usar el metodo Profession::all(); o el metodo Profession::get(); se recibe un objeto de la clase collection, 
        trae un array de objetos de la clase collection, para poder trabajar con POO
        */
        //Nota, para probar estos metodos se puede usar tinker, al teclear el comando php artisan tinker.

        /*Comandos para usar en Tinker, user->dato, para acceder a cualquier campo del usuario guardado en al variable
        user->save();   para guardar los cambios en la DB   user->all(); para obtener todos los usuarios
        
            OJOOOOOOO TINKER ES UNA HERRAMIENTA MUY PODEROSA PARA HACER PRUEBAS*/
    }
}
