<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductStore>
 */
class ProductStoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'code_entrada' => $this->faker->ean8(),
            'price_compra' => $this->faker->randomFloat('2', 0, 2),
            'price_venta' => $this->faker->randomFloat('2', 0, 2),
            'isActive' => true,
        ];
    }
}
