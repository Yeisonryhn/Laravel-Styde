 @extends('layout')
 @section('title',"Usuario {$user->id}")
 @section('content')
 
	<h2>Usuario numero: {{$user->id}}</h2>
	<p>Nombre del usuario: {{$user->name}}</p>
	<p>Correo: {{$user->email}}</p>

 @endsection