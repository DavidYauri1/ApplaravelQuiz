<?php

namespace Database\Factories;

use App\Models\Topic;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question_text' => $this->faker->paragraph(),
            'topic_id' => Topic::factory()
        ];
    }
}
