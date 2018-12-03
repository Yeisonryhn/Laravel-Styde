@extends('layout')

@section('title','Registro e Inicio de Sesion')

@section('content')
	<h1>Ruta para crear un nuevo usuario</h1>	
	<h1>Registro</h1>
	<p>Rellene el siguiente formulario para registrase como propietario de un vehiculo.</p>
	<p>Los campos marcados con "*" son obligatorios.</p><br>
	<form name='registro' method='get'>

		
		<input type="text" name="primernombre" placeholder="Primer Nombre" required>*  
		<input type="text" name="segundonombre" placeholder="Segundo Nombre" ><br><br>
		<input type="text" name="primerapellido" placeholder="Primer Apellido" required>*  
		<input type="text" name="segundoapellido" placeholder="Segundo Apellido" ><br><br>
		<input type="text" name="cedula" placeholder="C.I" required>*  
		<input type="text" name="direccion" placeholder="Direccion" required>*  <br><br>
		<input type="text" name="telefono" placeholder="Telefono" required>*  <br><br>
		<input type="text" name="email" placeholder="Email" required>*  
		<input type="text" name="email2" placeholder="Vuelva a Escribirlo" required>*<br><br>
		<input type="text" name="usuario" placeholder="Username" required>* 
		<input type="password" name="contraseña" placeholder="Contraseña" required>*<br><br>
		<button>Registrarse</button><br><br>
	</form>
@endsection

@section('sidebar')
	<h1>Inicio de Sesión.</h1><br>
	<form name=inicio method="get">
		<input type="text" name="usuario" placeholder="Username"> <br><br>
		<input type="password" name="contraseña" placeholder="Contraseña"> <br><br>
		<button>Iniciar Sesion</button><br><br>
	</form>
@endsection

