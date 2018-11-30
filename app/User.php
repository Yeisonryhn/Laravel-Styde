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
    public static function findUserByEmail($email){
         return static::where(compact('email'))->first();

        //tambien se puede cambiar static por User

    }

    public function isAdmin(){

        return $this->email === 'yeison@fuentes';
    }
}
