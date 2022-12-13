<?php

namespace Database\Factories;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    // protected $model = Like::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'user_id' => function () {
            //     return User::factory()->create()->id;
            // }
            'user_id' => User::all()->random()->id,
            'likeable_id' => Thread::all()->random()->id,
            'likeable_type' => 'threads',
        ];
    }

    public function thread(){
        return $this->state(function(){
            return[
                'likeable' => function(){
                    Thread::factory()->create()->id;
                },
            ];
        });
    }
}
