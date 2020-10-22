<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_IDs = Category::pluck('id')->toArray();
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween(1000,5000),
            'count' => 1000 ,
            'category_id' => $this->faker->randomElement($category_IDs)
        ];
    }
}
