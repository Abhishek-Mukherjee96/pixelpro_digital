<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('description');
            $table->string('subhead_one');
            $table->string('subhead_two');
            $table->string('subhead_three');
            $table->string('years_of_exp');
            $table->string('img_one');
            $table->string('img_two');
            $table->string('img_three');
            $table->string('button_url');
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
        Schema::dropIfExists('about_us');
    }
}
