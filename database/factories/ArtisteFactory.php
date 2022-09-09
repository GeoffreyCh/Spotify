<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\artiste;

class ArtisteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artiste::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word,
            'prenom' => $this->faker->word,
            'date_naissance' => $this->faker->word,
            'date_deces' => $this->faker->date(),
            'nationalite' => $this->faker->word,
            'pseudo' => $this->faker->word,
            'photo' => $this->faker->word,
        ];
    }
}
