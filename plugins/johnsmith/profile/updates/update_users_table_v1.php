<?php namespace JohnSmith\Profile\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class UpdateUsersTableV1 extends Migration
{
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('facebook')->nullable();
            $table->text('bio')->nullable();
        });
    }

    public function down()
    {
       Schema::table('users', function($table){
        $table->dropColumn([
            'facebook',
            'bio',
           ]);
       });
    }

}
