<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name'  => $this->faker->text(10),
            'description'=> $this->faker->text(20),
            'slug' => $this->faker->text(20),
            'image'=> '/upload/images/category.jpg',
            'meta_title' => $this->faker->text(20),
            'meta_keyword' => $this->faker->text(20),
            'meta_description' => $this->faker->text(20),
        ];
    }
}
