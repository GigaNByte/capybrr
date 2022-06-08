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
        'images/capybaras/cap_2.jpg',
        'images/capybaras/cap_3.jpg',
        'images/capybaras/cap_5.jpg',
        'images/capybaras/cap_6.jpg',
        'images/capybaras/cap_7.jpg',
        'images/capybaras/cap_8.jpg',
        'images/capybaras/cap_9.jpg',
        'images/capybaras/cap_10.jpg',
        'images/capybaras/cap_11.jpg',
        'images/capybaras/cap_12.jpg',
        'images/capybaras/cap_13.jpg',
        'images/capybaras/cap_14.jpg',
        'images/capybaras/cap_15.jpg',
        'images/capybaras/cap_16.jpg',
        'images/capybaras/cap_17.jpg',
        'images/capybaras/cap_18.jpg',
        'images/capybaras/cap_19.jpg',
        'images/capybaras/cap_20.jpg',
        'images/capybaras/cap_21.jpg',
        'images/capybaras/cap_22.jpg',
        'images/capybaras/cap_23.jpg',
        'images/capybaras/cap_24.jpg',
        'images/capybaras/cap_25.jpg',
    ];

    private array $descriptions = [
        "I'm water Capybara",
        "Okay, I pull up, hop out at the after party",
        "Trippin Capybara",
        "I believe in Capybara supremacy",
        "I'm just a coconut dog",
        "Howdy",
        "I'm water Capibaros",
        "Muchos Capibaros",
        "I'm inside your home",
        "Chillin' n' drippin'",
        "I like coffee especially Capycinno",
        "I'm Chonky Boi",
        "Rodentus Maximus",
        "I can confirm that capybaras WILL pull up and hop out at the after party",
        "I invade human homes and steal their food",
        "I like shrimps not SIMPS",
        "Say my name",
        "His Enormous Flofness",
        "The coconut nut is a giant nut. If you eat too much, you'll get very fat",
        "I like them Big, i like them CHONKY",
        "The only bug or mistake in this app is me",
        "Sigma Capybara",
        "OK I PULL UP",
        'I would add up three more databases to this project...',

    ];
}
