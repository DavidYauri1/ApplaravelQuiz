<?php

namespace Database\Factories;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'email' => $this->faker->email(),
            'comment_text' => $this->faker->paragraph(),
            'question_id' => Question::factory(),
            'quiz_id' => Quiz::factory()
        ];
    }
}
