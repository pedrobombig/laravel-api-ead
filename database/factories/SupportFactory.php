<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupportFactory extends Factory
{
    protected $model = Support::class;

    public function definition(): array
    {
        $userId = fake()->randomElement(User::pluck('id'));
        $lessonId = fake()->randomElement(Lesson::pluck('id'));

        return [
            'user_id' => $userId,
            'lesson_id' => $lessonId,
            'description' => fake()->unique()->sentence(20),
            'status' => 'P'
        ];
    }
}
