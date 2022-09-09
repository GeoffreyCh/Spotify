<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\groupe;

class GroupeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Groupe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'nationalite' => $this->faker->word,
            'date_creation' => $this->faker->word,
            'date_destruction' => $this->faker->date(),
            'photo' => $this->faker->word,
        ];
    }
}
