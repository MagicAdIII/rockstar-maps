<?php

use Illuminate\Database\Seeder;
use CockstarGays\Models\Maps\Marker;
use CockstarGays\Models\Maps\MarkerGroup;
use CockstarGays\Models\{Role, User, Game};

class DatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // Create roles.
        Role::create(['id' => 1, 'name' => 'Admin']);
        Role::create(['id' => 2, 'name' => 'User']);

        // Create games.
        Game::create(['title' => 'Grand Theft Auto V', 'slug' => 'gtav']);
        Game::create(['title' => 'Grand Theft Auto IV', 'slug' => 'gtaiv']);

        // Create markers and groups.
        factory(Marker::class, 20)->create();
        factory(MarkerGroup::class, 10)->create()->each(function ($group) use ($faker) {
            // These groups have 0-15 markers.
            $group->markers()->save(factory(Marker::class)->make());
            // And they belong to a game.
            // $group->game()->save(factory(Game::class)->make()); // @fixme
        });

        // Create users.
        factory(User::class, 'admin')->create();
        factory(User::class, 'user')->create();
        factory(User::class, 5)->create();
        // factory(User::class, 5)->create()->each(function ($user) {
        //     // These users have Markers.
        //     $user->markers()->save(factory('CockstarGays\Models\Maps\Marker')->make());
        // });
    }
}
