@extends('layout')

@section('title',"Crear Usuario")

@section('content')
    <h2>Ruta para crear un nuevo usuario</h2>
    <form action="{{ url( 'usuarios/crear' ) }}" method="POST">
        {{ csrf_field() }}<!--Campo cross site request forgery, es un campo que se debe agregar para las rutas post, 
            este campo nos protege que una pagina de terceros puede enviar una peticion http a nuestra pagina!-->

        <button type="submit">Crear Usuario</button>
    </form>
   <a href={{action('UserController@index')}}>tambien asi, llamando a un controlador</a>

   hol
@endsection