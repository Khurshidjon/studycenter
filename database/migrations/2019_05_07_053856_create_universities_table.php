<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('university_image')->nullable();
            $table->string('university_name_uz')->nullable();
            $table->string('university_name_ru')->nullable();
            $table->string('university_name_en')->nullable();
            $table->longText('university_content_uz')->nullable();
            $table->longText('university_content_ru')->nullable();
            $table->longText('university_content_en')->nullable();
            $table->integer('country_id');
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
        Schema::dropIfExists('universities');
    }
}
