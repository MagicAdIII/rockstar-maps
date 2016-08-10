<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarkerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marker_groups', function(Blueprint $table) {
            $table->increments('id');

            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();

            // $table->morphs('taggable');
            $table->boolean('active')->default(true);

            $table->integer('parent_id')->unsigned()->nullable();
            $table->foreign('parent_id')->references('id')->on('marker_groups');

            $table->integer('game_id')->unsigned()->nullable();
            $table->foreign('game_id')->references('id')->on('games');

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
        Schema::drop('marker_groups', function(Blueprint $table) {
            $table->dropForeign(['parent_id']);
            $table->dropForeign(['game_id']);
        });
    }
}
