<?php

namespace Database\Seeders;

use App\Models\Musique;
use Illuminate\Database\Seeder;

class MusiqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Musique::factory()->count(5)->create();
    }
}
