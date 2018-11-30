<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     /*este modelo ya trae la propiedad fillable definida*/
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [ 
        'is_admin'=>'boolean'
    ];

    //Este metodo es para saber cual es la profesion de este usuario
    public function profession()
    {   
        /*si se siguió la condicion de nombre de la clase +_id se puede hacer de la siguiente manera
        return $this->belongsTo(Profession::class);   SI no se siguió la convencion, se puede especificar la columna
        como segundo argumento de la funcion belongsTo como se especifica a continuacion.
        */
        return $this->belongsTo(Profession::class,"profession_id");//Un usuario tiene una profesion
        /*Con esto se puede acceder desde tinker a la profesion del usuario de dos maneras, luego de haber guardado el usuario en la
        variable siguiente "$user*->profession"devuelve un objero de la clase collection
                            "$user*->profession()" Devuelve una instancia de la clase belongsto esto es muy util si se
                            desea comenzar a escribir una consulta, por ejemplo
                             "$user*->profession()->where('is_admin', true)->get();trae todos los usuarios de esa profesion
                             que son administradores"*/

        /*Una funcion similar a esta se realizará en el modelo de Profesiones.
            Tambien existen laas funciones belongsToMany();
                                            hasOne();
                                            hasMany();
            Revisar en la documentacion de laravel

            */
    }


    public static function findUserByEmail($email){
         return static::where(compact('email'))->first();

        //tambien se puede cambiar static por User

    }

    public function isAdmin(){

        //return $this->email === 'yeison@fuentes';Anteriormente estaba asi, pero como se agregó la propiedad isadmin
        return $this->is_admin;
    }
}
 