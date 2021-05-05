<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WorkExperience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*  Schema::create('work_experience', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('loaction');
            $table->string('job_description');
            $table->string('time_period');
            $table->string('work_time_period_from');
            $table->string('work_time_period_to');
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
        /* Schema::dropIfExists('work_experience'); */
    }
}
