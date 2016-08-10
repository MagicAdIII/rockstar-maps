<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markers', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->text('description')->nullable();

            $table->double('x');
            $table->double('y');
            $table->double('z')->nullable();

            // $table->morphs('taggable');
            $table->boolean('checkable')->default(false);
            $table->boolean('active')->default(true);

            $table->integer('marker_group_id')->unsigned()->nullable();
            $table->foreign('marker_group_id')->references('id')->on('marker_groups');

            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('markers', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['marker_group_id']);
        });
    }
}
