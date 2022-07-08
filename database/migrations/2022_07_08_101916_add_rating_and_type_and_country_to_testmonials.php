<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRatingAndTypeAndCountryToTestmonials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testmonials', function (Blueprint $table) {
            $table->integer('rating')->default(0)->after('message_description');
            $table->string('type')->default('testmonial')->after('rating');
            $table->string('country')->after('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testmonials', function (Blueprint $table) {
            $table->dropColumn('rating');
            $table->dropColumn('type');
            $table->dropColumn('country');
        });
    }
}
