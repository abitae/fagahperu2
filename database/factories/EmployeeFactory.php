<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_code' => $this->faker->randomElement(['DNI', 'CE']),
            'code' => $this->faker->randomNumber(8, false),
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'date_brinday' => $this->faker->date('Y-m-d', 'now'),
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
        ];
    }
}
