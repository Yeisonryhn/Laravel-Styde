@extends('layout') 
@section('title', "{$title}")
@section('content')

    
        <!--<h1><//?php e($title)?></h1>-->
        <h1>{{$title}}</h1><!--La manera de imprimir variables con blade-->
    
        @if ($users->isNotEmpty())<!--Verifica que el objeto de la clase collection no esté vacio!-->
            <ul>
                @foreach ($users as $user)
                    <!--<li><//?php echo e($user) ?></li>-->
                    <li>{{$user->name}}, {{$user->email}}</li>
                    <a href="{{ url('/usuarios/'.$user->id)}}">Ver detalles</a>
                    <!-- esta es una forma de redireccionar enlaces que nos ofrece laravel, tambien se puede hacer
                     de la siguiente manera!-->
                @endforeach   
            </ul>       
        @else
            <p>No hay usuarios registrados.</p>
        @endif

    

@endsection 

@section('sidebar')
    @parent
       <!-- <h2>Barra lateral personalizada</h2>!-->

@endsection