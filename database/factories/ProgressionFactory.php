<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Progression::class, function (Faker $faker) {
    return [
        //


        'employe_id' =>factory(App\Employe::class)->create(),
        'commande_id' => factory(App\Commande::class)->create(),
        'lib_progres' => $faker->slug(2),
        //'prix_progres' => $faker->numberBetween(500,2000),
        'datdeb_progres' => $faker->dateTime,
        'datfin_progres' => $faker->dateTime(),
        'materiel_progres' => $faker->slug(5,false),


    ];
});
