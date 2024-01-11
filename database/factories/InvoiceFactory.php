<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>fake()->randomElement(User::pluck('id')),
            'client_name'=>fake()->name(),
            'invoice_date'=>fake()->date(),
            'due_date'=>fake()->date(),
            'last_billed_amount'=>fake()->numberBetween(100,1000),
            'deposit_amount'=>fake()->numberBetween(100,1000),
            'total_amount'=>fake()->numberBetween(100,1000),
            'status'=>fake()->randomElement(['draft','sent','paid'])
        ];
    }
}
