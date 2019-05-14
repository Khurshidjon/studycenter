<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('course_price');
            $table->string('course_image')->nullable();
            $table->string('student_count')->nullable()->default(0);
            $table->string('course_name_uz')->nullable();
            $table->string('course_name_ru')->nullable();
            $table->string('course_name_en')->nullable();
            $table->longText('course_content_uz')->nullable();
            $table->longText('course_content_ru')->nullable();
            $table->longText('course_content_en')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
