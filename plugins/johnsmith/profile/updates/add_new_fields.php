<?php namespace JohnSmith\Profile\Updates;

use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->string('facebook')->nullable();
            $table->text('bio')->nullable();
        });
    }



    public function down()
    {
       Schema::table('users', function(Blueprint $table){
        $table->dropColumn([
            'facebook',
            'bio',
           ]);
       });
    }
};
