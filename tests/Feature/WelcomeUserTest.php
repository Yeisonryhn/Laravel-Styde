<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WelcomeUserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test void
     */
    public function bienvenida_usuario_con_nickname()
    {
        $this->get('/saludo/yeison/yeisonn')->assertStatus(200)->assertSee('Hola Yeison, tu apodo es yeisonn');
    }

    /**
     * A basic test example.
     *
     * @test void
     */
    public function bienvenida_usuario_sin_nickname()
    {
        $this->get('/saludo/yeison')->assertStatus(200)->assertSee('Hola Yeison.');
    }
}
