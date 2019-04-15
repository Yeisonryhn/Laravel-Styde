@extends('layout')

@section('title',"Crear Usuario")

@section('content')

    <h2>Editar Usuario</h2>

    @if($errors->any())<!--Si existe algun error, la variable errors laravel la pasa automaticamente a la vista!-->
        <div class="alert alert-danger"><!--Esto es para ponerle color al mensaje de error por medio de bootstrap!-->
            <h5>Por favor corrige los siguentes errores.</h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li><!--Muestra el errror!-->
                @endforeach
    
            </ul>   
        </div>
    @endif
    <form action="{{ url( "usuarios/{$user->id}" ) }}" method="POST">

        {{ csrf_field() }}<!--Campo cross site request forgery, es un campo que se debe agregar para las rutas post, 
                    este campo nos protege que una pagina de terceros puede enviar una peticion http a nuestra pagina!-->
        {{method_field('PUT')}}
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old( 'name' , $user->name ) }}">
        @if($errors->has('name'))
            <p>{{ $errors->first('name') }}</p>
        @endif
        <br>

        <label for="email">Correo electrónico:</label>
        <input type="email" name="email" id="email" value="{{ old( 'email' , $user->email) }}">
        @if($errors->has('email'))
            <p>{{ $errors->first('email') }}</p>
        @endif
        <br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">
        @if($errors->has('password'))
            <p>{{ $errors->first('password') }}</p>
        @endif
        <br>
        <button type="submit">Editar Usuario</button>

    </form>

   <a href={{action('UserController@index')}}>Volver</a>

@endsection