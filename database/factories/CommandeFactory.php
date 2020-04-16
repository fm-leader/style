<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Commande;
use Faker\Generator as Faker;

$factory->define(Commande::class, function (Faker $faker) {
    return [
        //

        'modele_id' =>factory(App\Modele::class)->create(),
        'client_id' => factory(App\Client::class)->create(),
        'lib_cmd' => $faker->slug(2),
        'date_cmd' => $faker->dateTime,
        'rdv_cmd' => $faker->dateTime('now'),
        'prix_cmd' => $faker->numberBetween(5000,25000),
        'echantillon_cmd' => $faker->image('public/storage/images',640,480, null, false),
        'dimension_cmd' => $faker->slug(5,false),


    ];



});
