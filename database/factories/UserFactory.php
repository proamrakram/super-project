<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake()->unique()->name(),
            'phone' =>  fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '123456789',
            'user_type' => 'admin',
            'user_status' => 'active',
            // 'can_add',
            // 'can_edit',
            // 'can_cancel',
            // 'can_show_all',
            // 'can_booking',
            // 'can_send_sms',
            // 'branch_ids',
            // 'hash_login',
            // 'hash_expire',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
