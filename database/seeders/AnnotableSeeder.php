<?php

namespace Database\Seeders;

use App\Models\Annotable;
use Illuminate\Database\Seeder;

class AnnotableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Annotable::factory()->count(5)->create();
    }
}
