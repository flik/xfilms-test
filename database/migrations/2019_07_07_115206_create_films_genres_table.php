<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_genres', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('film_id')->unsigned();
            $table->integer('genre_id')->unsigned();
            $table->timestamps();

            $table->index(['film_id','genre_id']);

            $table->foreign('film_id')
                ->references('id')->on('films')
                ->onDelete('cascade');
            $table->foreign('genre_id')
                ->references('id')->on('genres')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('films_genres', function ($table) {
            $table->dropForeign(['genre_id']);
            $table->dropForeign(['film_id']);
        });

        Schema::drop('films_genres');
    }
}
