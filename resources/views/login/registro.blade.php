@extends('layout')

@section('title','Registro')
@section('content')
	
	<h1>Registro</h1>
	<p>Rellene el siguiente formulario para registrase como propietario de un vehiculo.</p>
	<p>Los campos marcados con "*" son obligatorios.</p><br>
	<form name='registro' method='get'>

		
		<input type="text" name="primernombre" placeholder="Primer Nombre">*  
		<input type="text" name="segundonombre" placeholder="Segundo Nombre"><br><br>
		<input type="text" name="primerapellido" placeholder="Primer Apellido">*  
		<input type="text" name="segundoapellido" placeholder="Segundo Apellido"><br><br>
		<input type="text" name="cedula" placeholder="C.I">*  
		<input type="text" name="direccion" placeholder="Direccion">*  <br><br>
		<input type="text" name="telefono" placeholder="Telefono">*  <br><br>
		<input type="text" name="email" placeholder="Email">*  
		<input type="text" name="email2" placeholder="Vuelva a Escribirlo">*<br><br>
		<input type="text" name="usuario" placeholder="Username">* 
		<input type="password" name="contraseña" placeholder="Contraseña">*<br><br>
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

