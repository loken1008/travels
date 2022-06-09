<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('place_id')->nullable();
            $table->string('tour_name');
            $table->longText('description');
            $table->string('main_price');
            $table->string('altitude')->nullable();
            $table->string('tour_days')->nullable();
            $table->string('accomodation')->nullable();
            $table->string('transport')->nullable();
            $table->string('mainImage')->nullable();
            $table->longText('cost_include')->nullable();
            $table->longText('cost_exclude')->nullable();
            $table->longText('map_url')->nullable();
            $table->enum('status',[0,1])->default(0);
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
        Schema::dropIfExists('tours');
    }
}
