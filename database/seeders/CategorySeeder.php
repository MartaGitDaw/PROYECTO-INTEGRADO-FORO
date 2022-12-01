<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Programming'
        ]);
        Category::create([
            'name' => 'Systems'
        ]);
        Category::create([
            'name' => 'Big Data'
        ]);
        Category::create([
            'name' => 'AI'
        ]);
        Category::create([
            'name' => 'IoT'
        ]);
        Category::create([
            'name' => 'Robotics'
        ]);
    }
}
