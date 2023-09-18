<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->tinyInteger('teacher')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->longText('content');
            $table->longText('details');
            $table->longText('sidebar');
            $table->string('langs_filter')->nullable();
            $table->string('ages_filter')->nullable();
            $table->string('stages_filter')->nullable();
            $table->tinyInteger('status')->default(1);
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
