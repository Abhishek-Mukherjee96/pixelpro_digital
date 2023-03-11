<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatWeOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('what_we_offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->string('icon');
            $table->string('sub_desc');
            $table->string('img_details')->nullable();
            $table->string('heading_one')->nullable();
            $table->string('desc_one')->nullable();
            $table->string('heading_two')->nullable();
            $table->string('desc_two')->nullable();
            $table->string('heading_three')->nullable();
            $table->string('option_one')->nullable();
            $table->string('option_two')->nullable();
            $table->string('option_three')->nullable();
            $table->string('option_four')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('what_we_offers');
    }
}
