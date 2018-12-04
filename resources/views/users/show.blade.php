 @extends('layout')
 @section('title',"Usuario {$user->id}")
 @section('content')
 
	<h2>Usuario numero: {{$user->id}}</h2>
	<p>Nombre del usuario: {{$user->name}}</p>
	<p>Correo: {{$user->email}}</p>
	<a href={{url('/usuarios')}}>Regresar</a>
	<!--ESTO TAMBIEN SE PUEDE HACER DE LA SIGGUIENTE MANERA, EL HELPER URL TAMBIEN SE PUEDE
		USAR COMO UN OBJETO, Y LLAMAR A DIFERENTES METODOS!-->
	<a href={{url()->previous()}}>Otra manera de regresar a la pagina anterior</a> 
	<br><a href={{action('UserController@index')}}>tambien asi, llamando a un controlador</a>
 @endsection