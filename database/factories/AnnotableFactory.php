<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Album;
use App\Models\Artiste;
use App\Models\Groupe;
use App\Models\Musique;
use App\Models\Playlist;
use App\Models\annotable;

class AnnotableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Annotable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'album_id' => Album::factory(),
            'artiste_id' => Artiste::factory(),
            'musique_id' => Musique::factory(),
            'groupe_id' => Groupe::factory(),
            'playlist_id' => Playlist::factory(),
        ];
    }
}
