<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /**
     *metodo que prueba la pagina de listado de usuarios
     * @test*/
    function al_cargar_la_pagina_de_usuarios()
    {
        $this->get('/usuarios')
        	->assertStatus(200)
        	->assertSee('Ruta para usuarios');
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
        	->assertSee('Ruta para crear un nuevo usuario.');
    }
}
