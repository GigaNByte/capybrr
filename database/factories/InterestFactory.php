<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InterestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $interests = $this->interests;
        $interest = $this->faker->unique()->randomElement($interests);
        return [
            'name' => $interest[0],
            'icon' => $interest[1]
        ];
    }
    private array $interests = [
        ["Eating","mdi-food-apple-outline"],
        ["Carnivore","mdi-grass"],
        ["Travel","mdi-airplane"],
        ["Sunbathing","mdi-weather-sunny"],
        ["Partying","mdi-party-popper"],
        ["Drinking","mdi-glass-cocktail"],
        ["Card Playing","mdi-cards"],
        ["Workout","mdi-dumbbell"]
    ];
}
