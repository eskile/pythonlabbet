<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCorrectanswerToTaskinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_infos', function (Blueprint $table) {
            $table->text('correct_answer')->nullable();
            $table->text('correct_input')->nullable();
            $table->text('correct_output')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('task_infos', function (Blueprint $table) {
            $table->dropColumn('correct_answer');
            $table->dropColumn('correct_input');
            $table->dropColumn('correct_output');
        });
    }
}
