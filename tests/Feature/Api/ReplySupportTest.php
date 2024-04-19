<?php

namespace Tests\Feature\Api;

use App\Models\Support;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Api\UtilsTrait;
use Tests\TestCase;

class ReplySupportTest extends TestCase
{
    use UtilsTrait;

    public function test_create_reply_to_support_unauthenticated(): void
    {
        $response = $this->postJson('/replies');

        $response->assertStatus(401);
    }

    public function test_create_reply_to_support_error_validations(): void
    {
        $response = $this->postJson('/replies', [], $this->defaultHeaders());

        $response->assertStatus(422);
    }

    public function test_create_reply_to_support(): void
    {
        $support = Support::factory()->create();

        $payload = ['support' => $support->id, 'description' => 'Description Test reply Support'];
        $response = $this->postJson('/replies', $payload, $this->defaultHeaders());

        $response->assertStatus(201);
    }
}
