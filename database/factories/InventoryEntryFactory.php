<?php

namespace Database\Factories;

use App\Models\Inventory;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryEntry>
 */
class InventoryEntryFactory extends Factory
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
            'supplier_id' => $this->faker->randomElement(Supplier::pluck('id')->toArray()),
            'description' => $this->faker->text(),
            'entry_code' => $this->faker->uuid(),
            'quantity' => $this->faker->numberBetween(1, 50),
            'unit_price' => $this->faker->randomFloat(2, 0, 200),
        ];
    }
}
