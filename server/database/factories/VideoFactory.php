<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->text(100),
            'video' => 'https://www.youtube.com/embed/oX4KcY0A9Nc',
            'status' => rand(1, 3),
        ];
    }
}
