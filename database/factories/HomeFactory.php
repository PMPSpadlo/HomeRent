<?php

namespace Database\Factories;

use App\Models\Home;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Home::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'beds' => $this->faker->numberBetween(1,12),
            'price_per_day' => $this->faker->numberBetween(15,70),
            'discount' => $this->faker->numberBetween(0,30),
        ];
    }
}
