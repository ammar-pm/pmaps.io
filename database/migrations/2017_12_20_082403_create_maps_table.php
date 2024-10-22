<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id');
            $table->string('title');
            $table->string('location')->nullable();
            $table->longtext('description')->nullable();
            $table->longtext('tags')->nullable();
            $table->integer('featured')->nullable();
            $table->string('visibility')->nullable();
            $table->integer('share')->nullable();
            $table->integer('comments')->nullable();
            $table->integer('measure')->nullable();
            $table->integer('coordinates')->nullable();
            $table->integer('print')->nullable();
            $table->integer('grid')->nullable();
            $table->timestamps();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maps');
    }
}
