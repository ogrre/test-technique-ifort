<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => $this->generateFrenchPhone(),
            'registration_date' => fake()->dateTimeBetween('-2 months', 'now'),
            'status' => fake()->randomElement(['validated', 'pending', 'incomplete', 'cancelled']),
            'is_priority' => fake()->boolean(20), // 20% chance of being priority
        ];
    }

    /**
     * Generate a French phone number format
     *
     * @return string
     */
    private function generateFrenchPhone(): string
    {
        return '06 ' . fake()->numerify('## ## ## ##');
    }

    /**
     * Indicate that the registration is validated.
     */
    public function validated(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'validated',
        ]);
    }

    /**
     * Indicate that the registration is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'pending',
        ]);
    }

    /**
     * Indicate that the registration is incomplete.
     */
    public function incomplete(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'incomplete',
        ]);
    }

    /**
     * Indicate that the registration is cancelled.
     */
    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'cancelled',
        ]);
    }

    /**
     * Indicate that the registration is a priority.
     */
    public function priority(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_priority' => true,
        ]);
    }
}
