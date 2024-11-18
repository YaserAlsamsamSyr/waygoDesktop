<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'firstName'=>$this->faker->firstName,
            'lastName'=>$this->faker->lastName,
            'fatherName'=>$this->faker->firstName,
            'motherName'=>$this->faker->firstName,
            'gender'=>$this->faker->name($gender),
            'iss'=>$this->faker->numberBetween(10000000000,99999999999),
            'phoneNumber'=>$this->faker->numberBetween(10000000000,99999999999)
        ];
    }
}
