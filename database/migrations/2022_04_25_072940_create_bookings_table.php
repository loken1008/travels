<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('tour_id');
            $table->string('fullname');
            $table->string('email');
            $table->string('address');
            $table->string('post_code');
            $table->string('telephone');
            $table->string('mobile');
            $table->string('country');
            $table->string('number_people');
            $table->string('arrival_date');
            $table->string('departure_date');
            $table->longText('message');
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
        Schema::dropIfExists('bookings');
    }
}
