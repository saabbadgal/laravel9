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
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            "dob" => $this->faker->dateTimeBetween('-38 years', '-18 years'),
            "gender" => $this->faker->randomElement(['male','female']),
            "anual_income" => $this->faker->numberBetween(50000, 300000),
            "occupation" => $this->faker->randomElement(['private_job','government_job','business']),
            "family_type" => $this->faker->randomElement(['joint_family','nuclear_family']), 
            "is_manglik" => $this->faker->numberBetween(0, 1),
            "partner_anual_income_range_from" => $this->faker->numberBetween(50000, 70000),
            "partner_anual_income_range_to" => $this->faker->numberBetween(70000, 300000),
            "partner_occupation" => $this->faker->randomElement(['private_job','government_job','business']),
            "partner_family_type" => $this->faker->randomElement(['joint_family','nuclear_family']), 
            "is_partner_manglik" => $this->faker->numberBetween(0, 1),
            'is_profile_complete' => 1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
