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
        Schema::create('departures', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('country_id')->nullable();
            $table->unsignedInteger('hotel_id')->nullable();
            $table->date('departure_departure')->nullable();
            $table->date('departure_arrival')->nullable();
            $table->string('departure_seats')->nullable();
            $table->string('departure_standard')->nullable();
            $table->unsignedInteger('departure_days')->nullable();
            $table->unsignedInteger('departure_price')->nullable();
            $table->unsignedInteger('departure_status')->default(0);
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
        Schema::dropIfExists('departures');
    }
};
