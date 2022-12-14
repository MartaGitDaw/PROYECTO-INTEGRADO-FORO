<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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

        // Usuarios
        \App\Models\User::factory(10)->create();

        // Categories
        $this->call(CategorySeeder::class);

        // Borrar la carpeta
        Storage::deleteDirectory('images-threads');
        // Crear la carpeta
        Storage::makeDirectory('images-threads');

        // Crear Hilos
        \App\Models\Thread::factory(30)->create();

        // Likes
        \App\Models\Like::factory(100)->create();
        
        // Comments
        \App\Models\Comment::factory(10)->create();

    }
}
