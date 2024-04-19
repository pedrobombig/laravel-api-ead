<?php


namespace Tests\Feature\Api;

use App\Models\User;

trait UtilsTrait
{
    public function createUser(): User
    {
        $user = User::factory()->create();

        return $user;
    }

    public function createToken(User $user): string
    {
        return $user->createToken('desktop')->plainTextToken;
    }

    public function createTokenUser(): string
    {
        $user = $this->createUser();
        $token =  $this->createToken($user);

        return $token;
    }

    public function defaultHeaders(): array
    {
        $token = $this->createTokenUser();

        return ['Authorization' => "Bearer {$token}"];
    }
}
