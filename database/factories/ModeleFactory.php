<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Modele;
use Faker\Generator as Faker;

$factory->define(Modele::class, function (Faker $faker) {
    $url=null;
    return [
        //
        'lib_modele' => $faker->slug(2),
        'prix_modele' => $faker->bankAccountNumber,
        'image_modele' => $faker->image('public/storage/images',640,480, null, false),
    ];
});
