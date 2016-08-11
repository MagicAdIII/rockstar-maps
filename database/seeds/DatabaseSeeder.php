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
        Game::create(['title' => 'Grand Theft Auto V', 'slug' => 'gtav', 'active' => true]);
        Game::create(['title' => 'Grand Theft Auto IV', 'slug' => 'gtaiv', 'active' => true]);

        // Create marker groups.
        MarkerGroup::buildTree([
          ['id' => 1, 'slug' => str_slug($faker->streetName), 'title' => 'TV & Home Theather'],
          ['id' => 2, 'slug' => str_slug($faker->streetName), 'title' => 'Tablets & E-Readers'],
          ['id' => 3, 'slug' => str_slug($faker->streetName), 'title' => 'Computers', 'children' => [
            ['id' => 4, 'slug' => str_slug($faker->streetName), 'title' => 'Laptops', 'children' => [
              ['id' => 5, 'slug' => str_slug($faker->streetName), 'title' => 'PC Laptops'],
              ['id' => 6, 'slug' => str_slug($faker->streetName), 'title' => 'Macbooks (Air/Pro)']
            ]],
            ['id' => 7, 'slug' => str_slug($faker->streetName), 'title' => 'Desktops'],
            ['id' => 8, 'slug' => str_slug($faker->streetName), 'title' => 'Monitors']
          ]],
          ['id' => 9, 'slug' => str_slug($faker->streetName), 'title' => 'Cell Phones']
        ]);

        // Create markers.
        MarkerGroup::all()->each(function ($group) use ($faker) {
            $group->game()->associate(1 /* gtav */)->save();
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
