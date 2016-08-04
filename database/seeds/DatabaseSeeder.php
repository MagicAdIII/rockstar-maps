<?php

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
        App\Models\Role::create(['id' => 1, 'name' => 'Admin']);
        App\Models\Role::create(['id' => 2, 'name' => 'User']);

        // Create users.
        factory(App\Models\User::class, 'admin')->create();
        factory(App\Models\User::class, 'user')->create();
        factory(App\Models\User::class, 10)->create();

    }
}
