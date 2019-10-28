<?php


$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'lastname' => null,
        'firstname' => null,
        'remember_token' => str_random(10),
    ];
});