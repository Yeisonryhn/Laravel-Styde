<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;//RECORDAR SIEMPRE IMPORTAR ESTA CLASE PARA USAR EL DB;
use App\User;//SE DEBE IMPORTAR ESTA CLASE PARA PODER USAR EL MODELO USER PARA PODER TRAER DATOS DE LA BASE DE DATOS

class UserController extends Controller
{
    public function index(){

        /*if (request()->has('empty')){
            $users = [];
        }else{
            $users = ['Joel','Ellie','Tess','Tommy', 'Yeison','Rahisbel','<script>alert("Clicker")</script>'];
            //trae codigo de javascrit que se debe escapar para evitar un ataque sql injection, mediante el metodo helper e(), dentro de la vista
        }*/
        //$users=DB::table('users')->get(); //TAMBIEN SE PUENDE TRAER DATOS DE LA BASE DE DATOS DE LA SIGUIENTE MANERA
        $users=User::all();
        //dd($users);
    	return view('users/index', [
    		'users'/*nombre variable*/=> $users,/*Variable a pasar*/
    		'title' => 'Listado de usuarios'
    						]);//de esta manera se pasan datos a una vista, con un arreglo asociativo

    	/*OTRAS FORMAS DE PASAR DATOS A UNA VISTA*/
    	/*return view('users')->with( [
    		'users' => $users,
    		'title' => 'Listado de usuarios'
    	]);*/

    	/*OTRA MAS*/
    	

    }

    public function show(User $user)
    {//Ahora recibe un modelo de laravel
        //$user=User::findOrFail($id);
        /*if($user==null){
            return view('errors.404');
        }*/
        //dd($user);
    	//return view('users/show', ['id' => $id]);
        return view('users/show', compact('user'));
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        //$data = request()->all();
        $data = request()->validate([/*el metodo validate, devuelve los campos especificados abajo, y con 
                                        las validaciones que pongamos*/         
            'name'=>'required',
            'email'=>[ 'required' , 'email' , 'unique:users,email' ],//En este campo hay especificadas tres reglas de validacion
            'password'=>[ 'required' , 'min:6', 'max:20' ]
        ],[
            'name.required'=>'El campo nombre es obligatorio'
        ]);

        //dd($data);
        User::create([
            'name' => $data["name"],
            'email' => $data["email"],
            'password' => bcrypt($data["password"]),
        ]);
        return redirect()->route('users.index');//redirecciona a la ruta con nombre de listado de usuarios
    }

}
