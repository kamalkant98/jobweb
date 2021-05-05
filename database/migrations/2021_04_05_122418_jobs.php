<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Jobs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*  Schema::create('Jobs', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->string('employer')->nullable();
            $table->string('category')->nullable();
            $table->string('subject')->nullable();
            $table->string('minimum_qualifaction')->nullable();
            $table->string('job_type')->nullable();
            $table->string('no_of_requirement')->nullable();
            $table->string('experience_minimum')->nullable();
            $table->string('experience_maximum')->nullable();
            $table->string('salary_type')->nullable();
            $table->string('salary_minimum')->nullable();
            $table->string('salary_maximum')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('og_title')->nullable();
            $table->string('og_description')->nullable();
            $table->string('og_keywords')->nullable();
            $table->string('selection_process')->nullable();
            $table->string('process_address')->nullable();
            $table->string('process_state')->nullable();
            $table->string('process_city')->nullable();
            $table->string('job_description')->nullable();
            $table->string('document_requirement')->nullable();
            $table->string('publish_by')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('Jobs');
    }
}
