<?php namespace JohnSmith\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohnsmithMovies4 extends Migration
{
    public function up()
    {
        Schema::table('johnsmith_movies_', function($table)
        {
            $table->text('actors')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('johnsmith_movies_', function($table)
        {
            $table->dropColumn('actors');
        });
    }
}
