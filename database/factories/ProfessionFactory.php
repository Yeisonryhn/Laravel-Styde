<?php

use Faker\Generator as Faker;
//se debe cambiar de "$factory->define(Model::class, function (Faker $faker)" lo que dice Model::class, por la clase en cuestion en este caso 
//App\Profession se le debe dar el namespace correcto

$factory->define(\App\Profession::class, function (Faker $faker) {
    return [
        //Aqui va a ir todo lo que queremos que se genere de forma aleatoria
        //'title'=>$faker->sentence
        //tambien se puede hacer lo siguiente
        'title'=>$faker->sentence(3, false)//oraciones solo con 3 palabras
    ];
});
