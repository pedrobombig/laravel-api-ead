<?php

namespace Tests\Feature\Api;

use App\Models\Lesson;
use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\UtilsTrait;
use Tests\TestCase;

class SupportTest extends TestCase
{
    use UtilsTrait;

    public function test_get_my_supports_unauthenticated(): void
    {
        $response = $this->getJson('/my-supports');

        $response->assertStatus(401);
    }

    public function test_get_my_supports(): void
    {
        $user = $this->createUser();
        $token =  $this->createToken($user);

        Support::factory()->count(50)->create(['user_id' => $user->id]);
        Support::factory()->count(50)->create();

        $response = $this->getJson('/my-supports', [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(200)
            ->assertJsonCount(50, 'data');
    }

    public function test_get_supports_unauthenticated(): void
    {
        $response = $this->getJson('/supports', []);

        $response->assertStatus(401);
    }

    public function test_get_supports(): void
    {
        Support::factory()->count(50)->create();

        $response = $this->getJson('/supports', $this->defaultHeaders());

        $response->assertStatus(200)
            ->assertJsonCount(50, 'data');
    }

    public function test_get_supports_filter_lesson(): void
    {
        $lesson = Lesson::factory()->create();

        Support::factory()->count(50)->create();
        Support::factory()->count(10)->create(['lesson_id' => $lesson->id]);

        $payload = ['lesson' => $lesson->id];
        $response = $this->json('GET', '/supports', $payload, $this->defaultHeaders());

        $response->assertStatus(200)
            ->assertJsonCount(10, 'data');
    }

    public function test_get_supports_filter_lesson_status(): void
    {
        $lesson = Lesson::factory()->create();

        Support::factory()->count(50)->create();
        Support::factory()->count(10)->create(['lesson_id' => $lesson->id]);
        Support::factory()->count(2)->create(['lesson_id' => $lesson->id, 'status' => 'C']);

        $payload = ['lesson' => $lesson->id, 'status' => 'C'];
        $response = $this->json('GET', '/supports', $payload, $this->defaultHeaders());

        $response->assertStatus(200)
            ->assertJsonCount(2, 'data');
    }

    public function test_create_supports_unauthenticated(): void
    {
        $response = $this->postJson('/supports', []);

        $response->assertStatus(401);
    }

    public function test_create_supports_error_validations(): void
    {
        $response = $this->postJson('/supports', [], $this->defaultHeaders());

        $response->assertStatus(422);
    }

    public function test_create_supports(): void
    {
        $lesson = Lesson::factory()->create();

        $payload = [
            'lesson' => $lesson->id,
            'status' => 'P',
            'description' => 'Description Test'
        ];
        $response = $this->postJson('/supports', $payload, $this->defaultHeaders());

        $response->assertStatus(201);
    }
}
