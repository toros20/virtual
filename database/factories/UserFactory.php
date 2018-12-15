<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
     return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'role' => $faker->randomElement($array = array ('student','student','student')) ,
        'fecha_nacimiento' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'activo' => $faker->numberBetween($min = 0, $max = 1),
        'cuenta' => $faker->unique()->numberBetween($min = 20190000, $max = 20199999),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
