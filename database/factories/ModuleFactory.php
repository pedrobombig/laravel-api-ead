<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModuleFactory extends Factory
{
    protected $model = Module::class;

    public function definition(): array
    {
        $courseId = fake()->randomElement(Course::pluck('id'));

        return [
            'course_id' => $courseId,
            'name' => fake()->unique()->name(),
        ];
    }
}
