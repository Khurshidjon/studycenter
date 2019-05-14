<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('category_id')->nullable();
            $table->string('title_uz');
            $table->string('title_ru');
            $table->string('title_en');
            $table->longText('body_uz');
            $table->longText('body_ru');
            $table->longText('body_en');
            $table->string('image')->nullable();
            $table->text('description_uz');
            $table->text('description_ru');
            $table->text('description_en');
            $table->integer('status')->default(0);
            $table->integer('view_count')->default(0);
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
        Schema::dropIfExists('blogs');
    }
}
