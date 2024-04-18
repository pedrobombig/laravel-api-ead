<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LessonFactory extends Factory
{
    protected $model = Lesson::class;

    public function definition(): array
    {
        $name =  fake()->unique()->name();

        return [
            'module_id' => Module::factory(),
            'name' => $name,
            'description' => fake()->unique()->sentence(20),
            'url' => Str::slug($name),
            'video' => Str::random()
        ];
    }
}
