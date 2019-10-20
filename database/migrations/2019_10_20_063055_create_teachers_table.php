<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('teacher_image')->nullable();
            $table->string('teacher_name_uz')->nullable();
            $table->string('teacher_name_en')->nullable();
            $table->string('teacher_name_ru')->nullable();
            $table->string('teacher_name_jp')->nullable();
            $table->string('teacher_description_uz')->nullable();
            $table->string('teacher_description_ru')->nullable();
            $table->string('teacher_description_en')->nullable();
            $table->string('teacher_description_jp')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('teachers');
    }
}
