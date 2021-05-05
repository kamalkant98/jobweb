<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Certifications extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('certification_title');
            $table->string('job_description');
            $table->string('certification_time_period');
            $table->string('certification_time_period_from');
            $table->string('certification_time_period_to');
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
        Schema::dropIfExists('certifications');
    }
}
