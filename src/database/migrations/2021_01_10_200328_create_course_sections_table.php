<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('section');
            $table->string('prev_section')->nullable();
            $table->string('next_section')->nullable();

            $table->foreign('course_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); //bug: should be on('courses')
            $table->foreign('section')->references('name')->on('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prev_section')->references('name')->on('sections')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('next_section')->references('name')->on('sections')->onUpdate('cascade')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_sections');
    }
}
