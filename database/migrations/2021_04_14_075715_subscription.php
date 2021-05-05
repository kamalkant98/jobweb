<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Subscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('subscription_title');
            $table->string('subscription_price');
            $table->string('for_category');
            $table->string('subscription_days');
            $table->string('subscription_features');
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
       /*  Schema::dropIfExists('subscriptions'); */
    }
}
