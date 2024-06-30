<?php

namespace Database\Factories;

use App\Constant\DBTypes;
use App\Services\TypeService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    
    function findType(String $code)
    {
        $service = new TypeService();
        return $service->getIdWithCode($code);
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'	=> fake()->name(),
            'username'	=> fake()->name(),
            'email'	=> fake()->unique()->safeEmail(),
            'password'	=> Hash::make('123'),
            'role' => $this->findType(DBTypes::RoleAnggota),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return $this
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
