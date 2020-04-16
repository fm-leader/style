<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Livraison::class, function (Faker $faker) {
    return [
        //
        'commande_id' => factory(App\Commande::class)->create(),
        'dat_livre' => $faker->dateTime,

    ];
});
