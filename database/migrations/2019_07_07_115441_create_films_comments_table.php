<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('film_id')->unsigned();
            $table->string('author_name');
            $table->text('comment_body');
            $table->timestamps();

            $table->index(['film_id']);

            $table->foreign('film_id')
                ->references('id')->on('films')
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
        Schema::table('films_comments', function ($table) {
            $table->dropForeign(['film_id']);
        });

        Schema::drop('films_comments');
    }
}
