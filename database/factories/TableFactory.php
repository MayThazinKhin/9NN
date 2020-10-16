<?php

namespace Database\Factories;

use App\Models\Marker;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Table::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $maker_IDs = Marker::pluck('id')->toArray();
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(150,500),
            'marker_id' => $this->faker->randomElement($maker_IDs)
        ];
    }
}
