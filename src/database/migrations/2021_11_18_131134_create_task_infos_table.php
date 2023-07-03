<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('code_id')->unique();
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('text')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_infos');
    }
}
