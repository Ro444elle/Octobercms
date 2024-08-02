<?php namespace JohnSmith\Movies\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateJohnsmithMovies extends Migration
{
    public function up()
    {
        Schema::table('johnsmith_movies_', function($table)
        {
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('year')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('johnsmith_movies_', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('description');
            $table->dropColumn('year');
        });
    }
}
