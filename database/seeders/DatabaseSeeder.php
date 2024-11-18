<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Trip;
use App\Models\Customer;
use App\Models\City;
use App\Models\Bus;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Bus::factory(5)->create();
        Trip::factory(5)->create();
        Customer::factory(10)->create();
        City::factory(5)->create();
    }
}
