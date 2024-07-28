<?php

namespace Database\Factories;

use App\Models\SqlexPrinter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SqlexPrinterFactory extends Factory
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
            'color' => $this->faker->randomElement(SqlexPrinter::COLOR),
            'type' => $this->faker->randomElement(SqlexPrinter::TYPE),
            'price' => $this->faker->randomFloat(0, 100, 1000),

//            $table->integer('code');
//            $table->integer('model');
//            $table->char('color');
//            $table->string('type');
//            $table->float('price');
        ];
    }
}
