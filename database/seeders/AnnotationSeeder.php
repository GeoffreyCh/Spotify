<?php

namespace Database\Seeders;

use App\Models\Annotation;
use Illuminate\Database\Seeder;

class AnnotationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Annotation::factory()->count(5)->create();
    }
}
