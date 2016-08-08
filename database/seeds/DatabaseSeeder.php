<?php

use App\Models\Role;
use App\Models\User;
use App\Models\Game;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create roles.
        Role::create(['id' => 1, 'name' => 'Admin']);
        Role::create(['id' => 2, 'name' => 'User']);

        // Create users.
        factory(User::class, 'admin')->create();
        factory(User::class, 'user')->create();
        factory(User::class, 10)->create();

        // Create games.
        Game::create(['title' => 'Grand Theft Auto V', 'slug' => 'gtav']);
        Game::create(['title' => 'Grand Theft Auto IV', 'slug' => 'gtaiv']);

    }
}
