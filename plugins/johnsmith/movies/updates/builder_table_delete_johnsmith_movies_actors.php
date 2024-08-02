<?php namespace JohnSmith\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteJohnsmithMoviesActors extends Migration
{
    public function up()
    {
        Schema::dropIfExists('johnsmith_movies_actors');
    }
    
    public function down()
    {
        Schema::create('johnsmith_movies_actors', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('name', 255)->nullable();
            $table->string('lastname', 255)->nullable();
        });
    }
}
