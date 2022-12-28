<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LendingOpenPosition>
 */
class LendingOpenPositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'RptDt' => fake()->date(),
            'TckrSymb' => fake()->firstName(),
            'ISIN' => fake()->lastName(),
            'Asst' => fake()->name(),
            'BalQty' => fake()->numberBetween(2, 10000),
            'TradAvrgPric' => fake()->numberBetween(10, 1000000),
            'PricFctr' => fake()->numberBetween(10, 10000),
            'BalVal' => fake()->numberBetween(10, 1000000),
        ];
    }
}
