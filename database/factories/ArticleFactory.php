<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [


            'title' => $this->faker->sentence(4),
            'body' => $this->faker->paragraph(2),

            'category_id' => $this->faker->numberBetween(1, 5),

        ];
    }
}
