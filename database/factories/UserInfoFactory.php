<?php

namespace Database\Factories;

use App\Models\Interest;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $interests = Interest::all()->random(3);
        $users = User::all();
        return [
            'user_id' =>  $attributes['user_id'] ?? $this->faker->unique()->numberBetween(1, $users->count()),
            'phone' =>  $attributes['phone'] ?? $this->faker->unique()->e164PhoneNumber(),
            'location' => $attributes['location'] ?? $this->faker->city(),
            'gender' => $attributes['gender'] ?? $this->faker->randomElement(['Male', 'Female']),
            'age' => $attributes['age'] ?? $this->faker->numberBetween(1,12),
            'profile_image' => $attributes['profile_image'] ??  $this->faker->randomElement($this->pictures),
            'relationship' =>  $attributes['relationship'] ??  $this->faker->randomElement(['Single', 'Complicated', 'Taken', 'Married']),
            'description' => $attributes['description'] ??  $this->faker->randomElement($this->descriptions),
            'species' => $attributes['species'] ?? 'Capybara',
        ];
    }

    private array $pictures = [
        'images/capybaras/cap_1.jpg',
        'images/capybaras/cap_2.jpg',
        'images/capybaras/cap_3.jpg',
    ];

    private array $descriptions = [
        "I'm water Capybara",
        "Okay, I pull up, hop out at the after party",
        "Trippin Capybara",
        "I believe in Capybara supremacy",
        "I'm just a coconut dog",
        "Howdy"
    ];
}
