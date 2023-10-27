<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NewModelFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->realText(rand(10, 20)),
            'description' => $this->faker->realText(rand(100, 255)),
            'content' => $this->faker->realText(rand(300, 500))
        ];
    }
}
