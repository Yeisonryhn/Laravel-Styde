<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        if (request()->has('empty')){
            $users = [];
        }else{
            $users = ['Joel','Ellie','Tess','Tommy', 'Yeison','Rahisbel','<script>alert("Clicker")</script>'];
            //trae codigo de javascrit que se debe escapar para evitar un ataque sql injection, mediante el metodo helper e(), dentro de la vista
        }
    	

    	return view('users', [
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

    public function show($id){
    	return "Ruta para el usuario: {$id}";
    }

    public function create(){
    	return 'Ruta para crear un nuevo usuario.';
    }

}
