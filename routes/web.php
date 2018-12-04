<?php
Route::get('/', function () {
    return view('welcome');
});
Route::get('/prueba',function(){
    return view('indexx');
});
Route::get('/usuarios', 'UserController@index')
    ->name('users');
//Route::get('/usuarios/')
Route::get('/usuarios/{id}', 'UserController@show')
    ->name('users.show')
    ->where('id','[0-9]+'); // lo de los corchetes es un parámetro dinámico
//Route::get('/usuarios/nuevo', 'UserController@')
Route::get('/usuarios/nuevo', 'UserController@create')
    ->name('users.create');

Route::get('/saludo/{name}/{nickname?}','WelcomeUserController');//el segundo parametro es opcional es por esto ?
/*
Es importante tener en cuenta el orden de las rutas porque ponerlas en un otro orden podria ocasionar errores
NOTA PARA VERIFICAR QUE ESTAS RUTAS ESTAN FUNCIONANDO CORRECTAMENTE LARAVEL TIENE UNA CARPETA LLAMADA TESTS EN LA QUE SE PUEDE ESCRIBIR CODIGO QUE SE ENCARGA DE PROBAR EL CODIGO DE LA APLICACION, HAY 2 CARPETAS, EL DIRECTORIO FEATURE QUE ES EN EL QUE SE HACEN PRUEBAS QUE SIMULAN CODIGO HTTP, Y EL DIRECTORIO UNIT QUE ES EN EL QUE SE VAN A HACER PRUEBAS DE PARTES ESPECIFICAS DE LA PAGINA WEB, COMO CLASES Y METODOS.

las pruebas se ejecutan desde la consola con el comando vendor/bin/phpunit. pero tambien se puede definir un alias a ese comando de la siguiente manera alias t=vendor/bin/phpunit y luego solo haria falta ejecutar solo t

SE CREÓ EL LA PRUEBA UsersModuleTest, QUE SE ENCARGA DE PROBAR LAS RUTAS DE USUARIO QUE HAY EN ESTE PEQUEÑO TUTORIAL 

*/