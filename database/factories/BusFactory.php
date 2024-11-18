<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'=>$this->faker->firstName,
            'numOfSeats'=>$this->faker->numberBetween(0,60),
            'driverName'=>$this->faker->firstName,
            'helpDriverName'=>$this->faker->firstName,
            'numberOfBus'=>$this->faker->numberBetween(10000,66666),
            'user_id'=>1
        ];
    }
}
