<?php

namespace Tests\Feature\Api;

use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\UtilsTrait;
use Tests\TestCase;

class LessonTest extends TestCase
{
    use UtilsTrait;

    public function test_get_lessons_unauthenticated(): void
    {
        $response = $this->getJson('/modules/fake_value/lessons');

        $response->assertStatus(401);
    }

    public function test_get_lessons_course_not_found(): void
    {
        $response = $this->getJson('/modules/fake_value/lessons', $this->defaultHeaders());

        $response->assertStatus(200)
            ->assertJsonCount(0, 'data');
    }

    public function test_get_lessons_module(): void
    {
        $module = Module::factory()->create();
        $response = $this->getJson("/modules/{$module->id}/lessons", $this->defaultHeaders());

        $response->assertStatus(200);
    }

    public function test_get_lessons_module_total(): void
    {
        $module = Module::factory()->create();
        Lesson::factory()->count(10)->create([
            'module_id' => $module->id
        ]);
        $response = $this->getJson("/modules/{$module->id}/lessons", $this->defaultHeaders());

        $response->assertStatus(200)
            ->assertJsonCount(10, 'data');
    }

    public function test_get_single_lesson_unauthenticated(): void
    {
        $response = $this->getJson("lessons/fake_value");

        $response->assertStatus(401);
    }

    public function test_get_single_lesson_not_found(): void
    {
        $response = $this->getJson("lessons/fake_value", $this->defaultHeaders());

        $response->assertStatus(404);
    }

    public function test_get_single_lesson(): void
    {
        $lesson = Lesson::factory()->create();
        $response = $this->getJson("lessons/{$lesson->id}", $this->defaultHeaders());

        $response->assertStatus(200);
    }
}
