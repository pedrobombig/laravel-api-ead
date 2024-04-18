<?php


namespace Tests\Feature\Api;

use App\Models\User;

trait UtilsTrait
{
    public function createTokenUser(): string
    {
        $user = User::factory()->create();
        $token =  $user->createToken('desktop')->plainTextToken;

        return $token;
    }

    public function defaultHeaders(): array
    {
        $token = $this->createTokenUser();

        return ['Authorization' => "Bearer {$token}"];
    }
}
