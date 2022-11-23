<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuizFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence();
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'description' => $this->faker->paragraph(),
            'published' => false,
            'public' => false,
        ];
    }

    public function published()
    {
        return $this->state(function (array $attributes) {
            return [
                'published' => true,
            ];
        });
    }

    public function public()
    {
        return $this->state(function (array $attributes) {
            return [
                'public' => true,
            ];
        });
    }
}
