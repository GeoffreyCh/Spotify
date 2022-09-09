<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Annotable;
use App\Models\Tag;
use App\Models\User;
use App\Models\annotation;

class AnnotationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Annotation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => Tag::factory(),
            'user_id' => User::factory(),
            'annotable_id' => Annotable::factory(),
        ];
    }
}
