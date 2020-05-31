<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            
            $table->BigInteger('project_id')->change()->unsigned();
            $table->foreign('project_id')->references('id')->on('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->BigInteger('user_id')->change()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign('projects_project_id_foreign');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex('projects_project_id_foreign');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('project_id')->change();
        });

        Schema::table('activities', function (Blueprint $table) {
            $table->dropForeign('users_user_id_foreign');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex('users_user_id_foreign');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->integer('user_id')->change();
        });

    }
}
