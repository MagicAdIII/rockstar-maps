<?php

use Faker\Generator;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CockstarGays\Models\User::class, function (Generator $faker) {
    return [
        'name' => $faker->optional()->name,
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'role_id' => 2,
        'social_club' => $faker->optional()->userName,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(CockstarGays\Models\User::class, 'admin', function ($faker) {
    return [
        'name' => 'Dan Houser',
        'username' => 'admin',
        'email' => 'admin@gtaplace.hu',
        'password' => bcrypt('kacsapicsa'),
        'role_id' => 1
    ];
});

$factory->defineAs(CockstarGays\Models\User::class, 'user', function ($faker) {
    return [
        'name' => 'Sam Houser',
        'username' => 'user',
        'email' => 'user@gtaplace.hu',
        'password' => bcrypt('kacsapicsa'),
        'role_id' => 2
    ];
});
