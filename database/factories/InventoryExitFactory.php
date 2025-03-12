<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Inventory;
use App\Models\InventoryEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryExit>
 */
class InventoryExitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'inventory_id' => $this->faker->randomElement(Inventory::pluck('id')->toArray()),
            'customer_id' => $this->faker->randomElement(Customer::pluck('id')->toArray()),
            'description' => $this->faker->text(),
            'exit_code' => $this->faker->uuid(),
            'quantity' => $this->faker->numberBetween(1, 50),
            'unit_price' => $this->faker->randomFloat(2, 0, 200),
        ];
    }
}
