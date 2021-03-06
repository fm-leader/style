<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employe;
use Faker\Generator as Faker;

$factory->define(Employe::class, function (Faker $faker) {
    return [
        //
        'nom_employe' => $faker->name(),
        'telephone_employe' => $faker->phoneNumber,
        'fonction_employe' => $faker->company,
    ];
});
