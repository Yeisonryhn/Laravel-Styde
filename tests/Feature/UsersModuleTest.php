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
        $this->withoutExceptionHandling();
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
        $this->withoutExceptionHandling();
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
        $this->withoutExceptionHandling();
        $user=factory(User::class)->create([
            'name'=>'Yeison Fuentes'
        ]);
        //dd($user);
        $this->get('/usuarios/'.$user->id)
        	->assertStatus(200)
        	->assertSee('Nombre del usuario: Yeison Fuentes');
    }
    /**
     * *
     * @test
     *  */
    function al_mostrar_error_404_si_el_usuario_no_existe()
    {
        //$this->withoutExceptionHandling();
        $this->get('/usuarios/999')
            ->assertStatus(404)
            ->assertSee('No existe ese usuario.');

    }

    /**
     * *metodo que prueba la ruta del nuevo usuario
     * @test
     */
    function al_cargar_nuevo_usuario()
    {
        $this->withoutExceptionHandling();
        $this->get('/usuarios/nuevo')
        	->assertStatus(200)
        	->assertSee('Ruta para crear un nuevo usuario');
    }

    /**
     * *metodo que prueba la ruta de crear nuevo usuario
     * @test
     */
    function al_crear_un_nuevo_usuario()
    {   
        $this->withoutExceptionHandling();
        
        $this->post('/usuarios/',[
            'name' => 'Yeison Fuentes',
            'email' => 'Yeisonfuentes@correo.net',
            'password' => '123456'
        ])->assertRedirect('usuarios');//Testea que devuelva una redireccion a la url de listado de usuarios
        /*como estamos hablando de un usuario para testear que se estan enviando los datos correctos
        se usa assertCredentials, ya que el bcrypt crea una contraseña encriptada distinta cada vez que se usa    */
        $this->assertCredentials([
            'name' => 'Yeison Fuentes',
            'email' => 'Yeisonfuentes@correo.net',
            'password' => '123456'
        ]);

        /*en caso contrario que sea otra tabla podemos usar el siguiente metodo*/
        /*$this->assertDatabaseHas('users' ,  [
            'name' => 'Yeison Fuentes',
            'email' => 'Yeisonfuentes@correo.net',
        ]);*/
        
    }

    /** @test */
    function the_name_is_required()
    {//VERIFICA QUE EL CAMPO NAME SEA OBLIGATORIO
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')//Esto nos dice que la peticion post se hace desde la url usuarios/nuevo
            ->post('/usuarios/',[
                'name'=>'',//el campo nombre va vacio, o null
                'email' => 'Yeisonfuentes@correo.net',
                'password' => '123456'
        ])
        ->assertRedirect('/usuarios/nuevo')//debe redireccionar a la url /usuarios/nuevo
        ->assertSessionHasErrors(['name'=>'El campo nombre es obligatorio']);//pero ahora con este mensaje de error
                
        $this->assertEquals(0,User::count());
        /*Deberian haber cero usuarios puesto que estamos usando la base de datos para las pruebas, y como se está usando el
         método RefreshDatabase, no deberia haber ningun usuario registrado al inicio de cada prueba, como esta prueba no 
         deberia registrar ningun usuario, deberia haber cero.*/

                
        /*$this->assertDatabaseMissing('users',[//verifica que en la base de datos no haya un usuario con ese correo
            'email'=>'Yeisonfuentes@correo.net'
        ]);*/

    }
    /** @test */
    function the_email_is_required()
    {//VERIFICA QUE EL CAMPO EMAIL SEA OBLIGATORIO
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name'=>'Yeison Fuentes',
                'email' => '',
                'password' => '123456'
        ])
        ->assertRedirect('/usuarios/nuevo')
        ->assertSessionHasErrors(['email']);
                
        $this->assertEquals(0,User::count());
    }

    /** @test */
    function email_must_be_valid()
    {//VERIFICA QUE EL CAMPO EMAIL SEA VALIDO

       //$this->withoutExceptionHandling();

        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name'=>'Yeison Fuentes',
                'email' => 'correo-no-valido',
                'password' => '123456'
        ])
        ->assertRedirect('/usuarios/nuevo')
        ->assertSessionHasErrors(['email']);
                
        $this->assertEquals(0,User::count());
    }

    /** @test */
    function email_must_be_unique()
    {//VERIFICA QUE EL CAMPO EMAIL SEA UNICO

        //$this->withoutExceptionHandling();

        //crea un usuario aleatorio con el siguiente correo
        factory(User::class)->create([
            'email'=>'yeison@correo.com'
        ]);
        //envia una peticion post para crear un nuevo usuario pero con el email anterior, deberia verificar si es unico    
        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name'=>'Yeison Fuentes',
                'email' => 'yeison@correo.com',
                'password' => '123456'
        ])
        ->assertRedirect('/usuarios/nuevo')
        ->assertSessionHasErrors(['email']);
                
        $this->assertEquals(1,User::count());
    }

    /** @test */
    function the_password_is_required()
    {//VERIFICA QUE EL CAMPO PASSWORD SEA OBLIGATORIO
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name'=>'Yeison Fuentes',
                'email' => 'yeisonfuentes@correo.com',
                'password' => ''
        ])
        ->assertRedirect('/usuarios/nuevo')
        ->assertSessionHasErrors(['password']);
                
        $this->assertEquals(0,User::count());
    }

    /** @test */
    function the_password_must_have_min_6_digits()
    {//VERIFICA QUE EL CAMPO PASSWORD SEA OBLIGATORIO
        //$this->withoutExceptionHandling();
        $this->from('usuarios/nuevo')
            ->post('/usuarios/',[
                'name'=>'Yeison Fuentes',
                'email' => 'yeisonfuentes@correo.com',
                'password' => '12345'
        ])
        ->assertRedirect('/usuarios/nuevo')
        ->assertSessionHasErrors(['password']);
                
        $this->assertEquals(0,User::count());
    }

    /** @test */
    function al_cargar_editar_usuario()
    {
        //$this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        //dd($user);
        $this->get("/usuarios/{$user->id}/editar")//Ojooooooooo, son necesarias las comillas dobles
            ->assertStatus(200)
            ->assertViewIs('users.edit')//Prueba que la ruta devuelva la vista indicada 
            ->assertSee('Editar Usuario')
            ->assertViewHas('user', function ($viewUser) use ($user){
                return $viewUser->id === $user->id;//para que no salga el error wasRecentlyCreated, se compara el id de la vista con el usuario que tiene en la prueba
            });//Revisa que la vista tenga una variable llamada user y que sea el objeto $user
    }
     

    /**
    * *metodo que prueba la ruta de crear nuevo usuario
    * @test
    */
    function al_actualizar_un_usuario()
    {   
        $user = factory(User::class)->create();

        $this->withoutExceptionHandling();
        
        $this->put("/usuarios/{$user->id}",[
            'name' => 'Yeison Fuentes',
            'email' => 'Yeisonfuentes@correo.net',
            'password' => '123456'
        ])->assertRedirect("/usuarios/{$user->id}");
        
        $this->assertCredentials([
            'name' => 'Yeison Fuentes',
            'email' => 'Yeisonfuentes@correo.net',
            'password' => '123456'
        ]);

        
    }
}
