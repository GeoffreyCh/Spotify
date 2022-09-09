<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisteGroupeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artiste_groupe', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groupe_id');
            $table->foreignId('artiste_id');
            $table->date('date_debut');
            $table->date('date_fin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artiste_groupe');
    }
}
