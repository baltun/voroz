<?php

namespace Database\Factories;

use App\Models\SqlexProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SqlexProductFactory extends Factory
{
    protected $model = SqlexProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'maker' => $this->faker->company(),
            'model' => $this->faker->numerify,
            'type' => $this->faker->numberBetween(0, 88888),
        ];
    }
}
