<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Listado de Usuarios</title>
    </head>
    <body> 
        <!--<h1><//?php e($title)?></h1>-->
        <h1>{{$title}}</h1><!--La manera de imprimir variables con blade-->

        @if (! empty($users))
            <ul>
                @foreach ($users as $user)
                    <!--<li><//?php echo e($user) ?></li>-->
                    <li>{{$user}}</li>
                @endforeach   
            </ul>       
        @else
            <p>No hay usuarios registrados.</p>
        @endif
           
        
    </body>
</html>
