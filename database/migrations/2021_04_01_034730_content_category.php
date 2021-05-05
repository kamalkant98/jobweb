<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContentCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /*  Schema::create('content_category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->string('description');
            $table->string('status');
            $table->string('parent_id');
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
        Schema::dropIfExists('content_category');
    }
}
