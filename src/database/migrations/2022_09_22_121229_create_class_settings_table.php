<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_settings', function (Blueprint $table) {
            $table->integer('class_id')->primary();
            $table->boolean('easy_mode')->nullable();
            $table->boolean('show_solutions')->nullable();
            $table->boolean('show_videos')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_settings');
    }
}
