<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Category;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::first();
        if (!$category) {
            $category = Category::factory()->create();
        }

        return [
            'name' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'description' => $this->faker->text(500),
            'slug' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'category_id' => $category->id,
            'price' => $this->faker->numberBetween(0, 999),
            'attributes' => $this->faker->word,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
