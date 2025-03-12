<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductStore;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id'=>$this->faker->randomElement(ProductStore::pluck('id')->toArray()),
            'warehouse_id'=>$this->faker->randomElement(Warehouse::pluck('id')->toArray()),
            'quantity' => $this->faker->randomNumber(3, false),
        ];
    }
}
