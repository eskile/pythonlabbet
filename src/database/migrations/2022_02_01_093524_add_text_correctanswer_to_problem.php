<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTextCorrectanswerToProblem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('problems', function (Blueprint $table) {
            $table->text('text')->nullable();
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
        Schema::table('problems', function (Blueprint $table) {
            $table->dropColumn('text');
            $table->dropColumn('correct_input');
            $table->dropColumn('correct_output');
        });
    }
}
