<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticketPrice'=>$this->faker->numberBetween(0,1000),
            'date'=>$this->faker->date(),
            'user_id'=>1,
            'bus_id'=>1
        ];
    }
}
