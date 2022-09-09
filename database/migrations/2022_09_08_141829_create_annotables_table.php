<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnotablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('annotables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained();
            $table->foreignId('artiste_id')->constrained();
            $table->foreignId('musique_id')->constrained();
            $table->foreignId('groupe_id')->constrained();
            $table->foreignId('playlist_id')->constrained();
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annotables');
    }
}
