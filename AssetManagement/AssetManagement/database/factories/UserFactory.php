<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'username' => 'Inderneel Minhas',
            'password' => bcrypt("62009187mY@1234"),
            'email' => 'inderneel.minhas@gmail.com',
            'role' => "ADMIN",
            'status' => 1,
        ];
    }
}
