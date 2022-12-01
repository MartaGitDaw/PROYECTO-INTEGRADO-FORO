<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Roles
        $this->call(RoleSeeder::class);

        // Admin
        $this->call(AdminSeeder::class);

         // Categories
         $this->call(CategorySeeder::class);

        // Usuarios
        \App\Models\User::factory(10)->create();
    }
}
