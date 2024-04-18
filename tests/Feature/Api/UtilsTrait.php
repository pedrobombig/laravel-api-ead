<?php


namespace Tests\Feature\Api;

use App\Models\User;

trait UtilsTrait
{
    public function createTokenUser()
    {
        $user = User::factory()->create();
        $token =  $user->createToken('desktop')->plainTextToken;

        return $token;
    }

    public function defaultHeaders()
    {
        $token = $this->createTokenUser();

        return ['Authorization' => "Bearer {$token}"];
    }
}
