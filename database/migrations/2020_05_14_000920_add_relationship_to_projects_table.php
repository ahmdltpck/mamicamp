<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            
            $table->BigInteger('owner_id')->change()->unsigned();
            $table->foreign('owner_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('projects', function (Blueprint $table) {
            $table->dropForeign('projects_owner_id_foreign');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->dropIndex('projects_owner_id_foreign');
        });
        Schema::table('projects', function (Blueprint $table) {
            $table->integer('owner_id')->change();
        });

    }
}
