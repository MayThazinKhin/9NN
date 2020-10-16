<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type_IDs = Type::pluck('id')->toArray();
        return [
            'name' => $this->faker->unique()->word,
            'type_id'=>$this->faker->randomElement($type_IDs)
        ];
    }
}
