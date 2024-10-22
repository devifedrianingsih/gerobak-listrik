<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CustomerName' => $this->faker->name,
            'CustomerEmail' => $this->faker->unique()->safeEmail,
            'CustomerPhone' => $this->faker->phoneNumber,
            'CustomerAddress' => $this->faker->address,
            'ProfileDetails' => $this->faker->paragraph,
        ];
    }
}
