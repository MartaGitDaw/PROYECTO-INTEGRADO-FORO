<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Thread>
 */
class ThreadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Smknstd\FakerPicsumImages\FakerPicsumImagesProvider($this->faker));
        return [
            'title'=>ucfirst($this->faker->unique()->words(5,true)),
            'description'=>$this->faker->text(),
            'image'=>'images-threads/'.$this->faker->image('public/storage/images-threads', 640, 480, false),
            'user_id'=>User::all()->random()->id,
            'category_id'=>Category::all()->random()->id
        ];
    }
}
