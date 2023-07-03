<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSectionToTaskInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('task_infos', function (Blueprint $table) {
            $table->string('section')->nullable();
        });
        Schema::table('task_infos', function (Blueprint $table) {
            $table->foreign('section')->references('name')->on('sections')->onDelete('cascade');
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
            $table->dropColumn('section');
        });
    }
}
