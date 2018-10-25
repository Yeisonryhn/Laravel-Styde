<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
   	public function __invoke($name, $nickname=null){//invoke se usa cuando el controlador tiene un solo metodo, para al momento de llamarlo no tener que especificar WelcomeUserController@metodo
   		$name=ucfirst($name);
		if($nickname){
			return "Hola {$name}, tu apodo es {$nickname}";	
		}else{
			return "Hola {$name}.";
		}
   	}
}
