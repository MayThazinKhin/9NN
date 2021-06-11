<?php

namespace Database\Factories;

use App\Models\Staff;
use App\Models\Table;
use Illuminate\Database\Eloquent\Factories\Factory;

class TableFactory extends Factory
{
    protected $model = Table::class;

    public function definition()
    {
        $maker_IDs = Staff::pluck('id')->where('role','marker')->toArray();
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(150,500),
            'power_off_price' => $this->faker->numberBetween(150,500),
            'marker_id' => $this->faker->randomElement($maker_IDs)
        ];
    }
}
