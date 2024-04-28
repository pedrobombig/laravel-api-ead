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
        $moduleId = fake()->randomElement(Module::pluck('id'));

        return [
            'module_id' => $moduleId,
            'name' => $name,
            'description' => fake()->unique()->sentence(20),
            'url' => Str::slug($name),
            'video' => 'https://www.youtube.com/embed/a3ICNMQW7Ok' //random example video
        ];
    }
}
