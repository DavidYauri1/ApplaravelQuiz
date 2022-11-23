<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    public function definition(): array
    {
        return [
            'result' => rand(0, 10),
            'ip_address' => $this->faker->ipv4(),
            'time_spent' => rand(5, 555),
            'user_id' => User::factory(),
            'quiz_id' => Quiz::factory(),
        ];
    }
}
