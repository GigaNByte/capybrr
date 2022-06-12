<?php

namespace Database\Factories;

use App\Models\SingleMatch;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class SingleMatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_1 = User::all()->random(1)[0];
        $user_2 = User::all()->except($user_1->id)->random();



        return [
            'user_one_id' => $user_1->id,
            'user_two_id' => $user_2->id,
            'has_user_one_liked' => $this->faker->boolean(),
            'has_user_two_liked' => $this->faker->boolean()
        ];
    }
}
//https://stackoverflow.com/questions/43202886/laravel-seeding-multiple-unique-columns-with-faker
