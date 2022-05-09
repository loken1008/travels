<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->longText('facebook')->nullable();
            $table->longText('twitter')->nullable();
            $table->longText('instagram')->nullable();
            $table->longText('linkedin')->nullable();
            $table->longText('youtube')->nullable();
            $table->longText('google')->nullable();
            $table->longText('pinterest')->nullable();
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
        Schema::dropIfExists('site_settings');
    }
}
