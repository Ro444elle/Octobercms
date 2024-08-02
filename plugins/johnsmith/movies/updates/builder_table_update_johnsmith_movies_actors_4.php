<?php namespace JohnSmith\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohnsmithMoviesActors4 extends Migration
{
    public function up()
    {
        Schema::table('johnsmith_movies_actors', function($table)
        {
            $table->integer('age')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('johnsmith_movies_actors', function($table)
        {
            $table->dropColumn('age');
        });
    }
}