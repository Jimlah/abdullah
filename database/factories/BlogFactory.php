<?php

namespace Database\Factories;

use App\Domain\Blogs\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends Factory<Model>
 */
class BlogFactory extends Factory
{

    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3,  true),
            'body' => $this->faker->paragraphs(4, true)
        ];
    }
}
