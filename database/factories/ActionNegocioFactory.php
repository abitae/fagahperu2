<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Negocio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActionNegocio>
 */
class ActionNegocioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'negocio_id' => $this->faker->randomElement(Negocio::pluck('id')->toArray()),
            'contact_id' => $this->faker->randomElement(Contact::pluck('id')->toArray()),
            'tipo' => $this->faker->randomElement(['EMAIL', 'LLAMADA', 'OTRO']),
            'date' => $this->faker->date('Y-m-d', 'now'),
            'description' => $this->faker->text(250),
        ];
    }
}
