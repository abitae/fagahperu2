<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductStore;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CodeExit>
 */
class CodeExitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_store_id'=>$this->faker->randomElement(ProductStore::pluck('id')->toArray()),
            'name'=> $this->faker->ean8(),
        ];
    }
}
