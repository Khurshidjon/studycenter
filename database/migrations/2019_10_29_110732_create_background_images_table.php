<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackgroundImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('background_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trading_center_image')->nullable();
            $table->string('schedules_image')->nullable();
            $table->string('teachers_image')->nullable();
            $table->string('language_courses_image')->nullable();
            $table->string('work_and_study_image')->nullable();
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
        Schema::dropIfExists('background_images');
    }
}
