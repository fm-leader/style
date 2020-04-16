<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Payement::class, function (Faker $faker) {
    return [
        //

        'commande_id' => factory(App\Commande::class)->create(),
        'mnt_paie' => $faker->numberBetween(500,2000),
        'dat_paie' => $faker->dateTime(),

    ];
});
