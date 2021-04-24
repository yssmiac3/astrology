<?php

namespace Database\Factories;

use App\Models\Astrologist;
use Illuminate\Database\Eloquent\Factories\Factory;

class AstrologistFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Astrologist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email(),
            'biography' => $this->faker->text(),
        ];
    }
}
