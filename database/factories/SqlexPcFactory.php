<?php

namespace Database\Factories;

use App\Models\SqlexPc;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SqlexPc>
 */
class SqlexPcFactory extends Factory
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
            'speed' => $this->faker->randomElement(SqlexPc::SPEED),
            'ram' => $this->faker->randomElement(SqlexPc::RAM),
            'hd' => $this->faker->randomFloat(0, 5, 50),
            'cd' => $this->faker->randomElement(SqlexPc::CD),
            'price' => $this->faker->randomFloat(0, 100, 1000),
//            $table->integer('code');
//            $table->integer('model');
//            $table->integer('speed');
//            $table->integer('ram');
//            $table->float('hd');
//            $table->string('cd');
//            $table->float('price');
        ];
    }
}
