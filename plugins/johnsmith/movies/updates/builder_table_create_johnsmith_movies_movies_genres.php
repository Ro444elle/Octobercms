<?php namespace JohnSmith\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateJohnsmithMoviesMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('johnsmith_movies_movies_genres', function($table)
        {
            $table->integer('movie_id');
            $table->integer('genre_id');
            $table->primary(['movie_id','genre_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('johnsmith_movies_movies_genres');
    }
}
