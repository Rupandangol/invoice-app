<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id'=>fake()->randomElement(Invoice::pluck('id')),
            'product_name'=>fake()->word(),
            'product_number'=>fake()->randomNumber(5,true),
            'slip_no'=>fake()->randomNumber(6,true),
            'document_date'=>fake()->date(),
            'quantity'=>fake()->numberBetween(1,9),
            'unit_price'=>fake()->numberBetween(100,10000)
        ];
    }
}
