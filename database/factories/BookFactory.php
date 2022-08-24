<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(10),
            'slug' => $this->faker->text(10),
            'price'=> $this->faker->randomDigit(),
            'quantity'=> $this->faker->randomDigit(),
            'sprice'=> $this->faker->randomDigit(),
            'description' => $this->faker->text(20),
            'pages' => $this->faker->randomDigit(),
            'author'=> $this->faker->text(10),
        ];
    }
}
