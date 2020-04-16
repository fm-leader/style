<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        //

        'nom_client' => $faker->name(),
        'contact_client' => $faker->phoneNumber,

    ];
});
