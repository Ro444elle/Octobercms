<?php namespace JohnSmith\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohnsmithMovies3 extends Migration
{
    public function up()
    {
        Schema::table('johnsmith_movies_', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('johnsmith_movies_', function($table)
        {
            $table->increments('id')->unsigned()->change();
        });
    }
}
