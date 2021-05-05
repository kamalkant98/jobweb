<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Educations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('level_of_education');
            $table->string('field_of_study');
            $table->string('college_or_university');
            $table->string('currently_enrolled');
            $table->string('time_period_from');
            $table->string('time_period_to');
            $table->string('status');
            $table->timestamps();
        }); */
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('educations');
    }
}
