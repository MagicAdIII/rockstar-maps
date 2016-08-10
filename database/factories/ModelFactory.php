<?php

use Faker\Generator;
use CockstarGays\Models\Maps\Marker;
use CockstarGays\Models\Maps\MarkerGroup;
use CockstarGays\Models\{User, Game};

/**
 * User factories.
 */
$factory->define(User::class, function (Generator $faker) {
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

$factory->defineAs(User::class, 'admin', function ($faker) {
    return [
        'name' => 'Dan Houser',
        'username' => 'admin',
        'email' => 'admin@gtaplace.hu',
        'password' => bcrypt('kacsapicsa'),
        'role_id' => 1
    ];
});

$factory->defineAs(User::class, 'user', function ($faker) {
    return [
        'name' => 'Sam Houser',
        'username' => 'user',
        'email' => 'user@gtaplace.hu',
        'password' => bcrypt('kacsapicsa'),
        'role_id' => 2
    ];
});

/**
 * Marker factories.
 */
$factory->define(MarkerGroup::class, function (Generator $faker) {
    $title = $faker->sentence(3);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'description' => $faker->optional()->paragraph,
        'parent_id' => null,
        'game_id' => $faker->numberBetween(1, 2),
        'active' => $faker->boolean(90),
    ];
});

$factory->define(Marker::class, function (Generator $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->optional()->paragraph,
        'x' => $faker->latitude,
        'y' => $faker->longitude,
        'z' => null,
        'checkable' => $faker->boolean,
        'active' => $faker->boolean(90),
    ];
});
