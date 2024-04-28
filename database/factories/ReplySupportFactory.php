<?php

namespace Database\Factories;

use App\Models\Support;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ReplySupportFactory extends Factory
{
    public function definition(): array
    {
        $userId = fake()->randomElement(User::pluck('id'));
        $supportId = fake()->randomElement(Support::pluck('id'));

        return [
            'user_id' => $userId,
            'support_id' => $supportId,
            'description' => fake()->unique()->sentence(20)
        ];
    }
}
