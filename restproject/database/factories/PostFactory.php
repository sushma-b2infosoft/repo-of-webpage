<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,     // random title
            'body' => $this->faker->paragraph,     // random paragraph
            'published' => $this->faker->boolean,  // true ya false
            'category' => $this->faker->word,      // random single word
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

