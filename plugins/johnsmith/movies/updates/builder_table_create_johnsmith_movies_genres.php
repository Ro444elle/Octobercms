<?php namespace JohnSmith\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateJohnsmithMoviesGenres extends Migration
{
    public function up()
    {
        Schema::create('johnsmith_movies_genres', function($table)
        {
            $table->increments('id');
            $table->string('genre_title');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('johnsmith_movies_genres');
    }
}
