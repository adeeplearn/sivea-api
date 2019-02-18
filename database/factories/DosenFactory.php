<?php

use Faker\Generator as Faker;

$factory->define(App\Dosen::class, function (Faker $faker) {
    return [
        'nama_dosen'=> $faker->name,
        'email'=> $faker->unique()->safeEmail,
        'last_login' =>now()
    ];
});
