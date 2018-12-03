<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase;//para que refresque la base de datos de entorno de pruebas 
    /**
     *metodo que prueba la pagina de listado de usuarios
     * @test*/
    function al_cargar_el_listado_de_usuarios()
    {

        factory(User::class)->create([
            'name'=>'Joel'
        ]);

        factory(User::class)->create([
            'name'=>'Ellie'
        ]);
        $this->get('/usuarios')
        	->assertStatus(200)
        	->assertSee('Listado de usuarios')
            ->assertSee('Joel')
            ->assertSee('Ellie');
    }

     /**
     *metodo que prueba la pagina de listado de usuarios
     * @test*/
    function si_la_lista_esta_vacia()
    {
        DB::table('users')->truncate();
        //para que vacie la tabla de usuarios del entorno de pruebas automatizadas
        
        $this->get('/usuarios')
            ->assertStatus(200)
            ->assertSee('Listado de usuarios')
            ->assertSee('No hay usuarios registrados.');
    }

    /**
     * *metodo que prueba la ruta del detalle de un usuario
     * @test
     */
    function al_cargar_la_pagina_de_detalle_usuarios()
    {
        $this->get('/usuarios/5')
        	->assertStatus(200)
        	->assertSee('Ruta para el usuario: 5');
    }

    /**
     * *metodo que prueba la ruta del nuevo usuario
     * @test
     */
    function al_cargar_nuevo_usuario()
    {
        $this->get('/usuarios/nuevo')
        	->assertStatus(200)
        	->assertSee('Ruta para crear un nuevo usuario');
    }
}
