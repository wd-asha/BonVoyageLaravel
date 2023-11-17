<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_title')->nullable();
            $table->integer('country_id')->nullable();
            $table->string('hotel_town')->nullable();
            $table->integer('hotel_stars')->nullable();
            $table->text('hotel_place')->nullable();
            $table->text('hotel_tours')->nullable();
            $table->text('hotel_about')->nullable();
            $table->integer('hotel_rooms')->nullable();
            $table->integer('hotel_price')->nullable();
            $table->string('hotel_image1')->nullable();
            $table->string('hotel_image2')->nullable();
            $table->string('hotel_image3')->nullable();
            $table->string('hotel_image4')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
