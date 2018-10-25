<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Listado de Usuarios</title>
    </head>
    <body> 
        <h1><?php echo e($title)?></h1> 

        <ul>
            <?php foreach ($users as $user):?>
                <li><?php echo e($user) ?></li>
            <?php endforeach; ?>    
        </ul>      
        
    </body>
</html>
