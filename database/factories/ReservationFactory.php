<?php

namespace Database\Factories;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReservationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Reservation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'home_id' => $this->faker->numberBetween(1,20),
            'beds' => $this->faker->numberBetween(1,3),
            'total_cost' => $this->faker->numberBetween(30,300),
            'reservation_start' => $this->faker->dateTimeBetween('now', '+10 days')->format('d.m.Y'),
            'reservation_end' => $this->faker->dateTimeBetween('+10 days', '+20 days')->format('d.m.Y'),
        ];
    }
}
