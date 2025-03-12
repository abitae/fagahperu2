<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negocio>
 */
class NegocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'customer_id' => $this->faker->randomElement(Customer::pluck('id')->toArray()),
            'user_id' => $this->faker->randomElement(User::pluck('id')->toArray()),
            'code' => $this->faker->randomNumber(8, false),
            'name' => $this->faker->name(),
            'date_closing' => $this->faker->date('Y-m-d', 'now'),
            'priority' => $this->faker->randomElement(['ALTA', 'MEDIA', 'BAJA']),
            'monto_aprox' => $this->faker->randomFloat('2',0,2),
            'stage' => $this->faker->randomElement(['ABIERTO', 'GANADO', 'PERDIDO']),
            'description' => $this->faker->text(250),
            'isActive' => true,
        ];
    }
}
