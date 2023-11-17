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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('slug')->nullable();
            $table->unsignedInteger('departure_id')->nullable();
            $table->date('departure_departure')->nullable();
            $table->date('departure_arrival')->nullable();
            $table->string('departure_seats')->nullable();
            $table->string('departure_standard')->nullable();
            $table->unsignedInteger('departure_days')->nullable();
            $table->unsignedInteger('departure_price')->nullable();
            $table->string('departure_town')->nullable();
            $table->string('departure_country')->nullable();
            $table->string('departure_hotel')->nullable();
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
        Schema::dropIfExists('order_items');
    }
};
