<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherFeedbackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_feedback', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('teacher_id');
            $table->bigInteger('student_id');
            $table->string('code_id');
            $table->text('feedback')->nullable();
            $table->boolean('view')->default(1);
            $table->boolean('need_help')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_feedback');
    }
}
