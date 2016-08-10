<?php

use Illuminate\Database\Seeder;
use CockstarGays\Models\{User, Role, Game, Marker, MarkerGroup};

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

        // Create marker groups and save them 0-15 markers each.
        factory(MarkerGroup::class, 10)->create()->each(function ($group) use ($faker) {
            $random = $faker->numberBetween(0, 15);
            foreach (range(0, $random) as $i) {
                $group->markers()->save(factory(Marker::class)->make());
            }
        });

        // Create users.
        factory(User::class, 'admin')->create();
        factory(User::class, 'user')->create();
        factory(User::class, 10)->create();

    }
}
