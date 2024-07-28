<?php

namespace Database\Factories;

use App\Models\SqlexLaptop;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SqlexLaptopFactory extends Factory
{
    static $codeNumber = 0;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => self::$codeNumber++,
            'model' => $this->faker->randomNumber(3, true),
            'speed' => $this->faker->randomElement(SqlexLaptop::SPEED),
            'ram' => $this->faker->randomElement(SqlexLaptop::RAM),
            'hd' => $this->faker->randomFloat(0, 5, 50),
            'price' => $this->faker->randomFloat(0, 100, 1000),
            'screen' => $this->faker->randomElement(SqlexLaptop::SCREEN),

//            $table->integer('code');
//            $table->integer('model');
//            $table->integer('speed');
//            $table->integer('ram');
//            $table->float('hd');
//            $table->float('price');
//            $table->integer('screen');
        ];
    }
}
