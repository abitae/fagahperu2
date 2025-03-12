<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Line>
 */
class LineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code' => $this->faker->randomNumber(8, false),
            'name' => $this->faker->name(),
            'logo' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
            'fondo' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
            'firma_autorizacion' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
            'fondo_autorizacion' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
            'fondo_rotulo' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
            'archivo' => $this->faker->imageUrl(360, 360, 'animals', true, 'cats'),
            'isActive' => true,
        ];
    }
}
