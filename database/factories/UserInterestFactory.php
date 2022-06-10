<?php

namespace Database\Factories;

use App\Models\Interest;
use App\Models\User;
use App\Models\UserInterest;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInterestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->unique()->random(1)[0];
        //get random interest from all interests except the user's interest
        $interest = Interest::all()->unique()->random(1)[0];



        return [
            'user_id' => $attributes['user_id'] ?? $user->id,
            'interest_id' =>  $attributes['interest_id'] ?? $interest->id,
        ];
    }
}
