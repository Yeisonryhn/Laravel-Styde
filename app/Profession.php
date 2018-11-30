<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    /*Esto se agrega para que laravel solo pueda recibir estos datos del usuario para guardarlos en la
    DB, de esta manera el usuario solo puede ingresar el titulo de una profesion, el resto de datos los
    pone laravel*/
    protected $fillable =['title'];

    /*Revisar las notas de este metodo en el modelo de usuario*/
    public function users(){
        return $this->hasMany(User::class);
    }
}


