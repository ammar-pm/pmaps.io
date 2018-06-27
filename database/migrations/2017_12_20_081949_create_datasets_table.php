<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatasetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datasets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id');
            $table->string('title');
            $table->longtext('description')->nullable();
            $table->string('visibility')->nullable();
            $table->string('type')->nullable();
            $table->string('style')->nullable();
            $table->longtext('data')->nullable();
            $table->string('file_type')->nullable();
            $table->integer('enable_popup')->nullable();
            $table->longtext('popup_template')->nullable();
            $table->longtext('file_data')->nullable();
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
        Schema::dropIfExists('datasets');
    }
}
