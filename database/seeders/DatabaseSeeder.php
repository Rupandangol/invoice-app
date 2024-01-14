<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class
        ]);
        \App\Models\User::factory(10)->create();
        \App\Models\Invoice::factory(20)->create();
        \App\Models\InvoiceItem::factory(80)->create();
        \App\Models\Company::factory(1)->create();
    }
}
