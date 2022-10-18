<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActivityAndGradeAndRegionAndMealAndBestMonthAndGroupSizeAndStartEndToTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
           $table->string('activity')->nullable()->after('transport');
           $table->string('grade')->nullable()->after('activity');
           $table->string('region')->nullable()->after('grade');
           $table->longText('meal')->nullable()->after('region');
           $table->longText('best_month')->nullable()->after('meal');
           $table->string('group_size')->nullable()->after('best_month');
           $table->string('start_end')->nullable()->after('group_size');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->dropColumn('activity');
           $table->dropColumn('grade');
           $table->dropColumn('region');
           $table->dropColumn('meal');
           $table->dropColumn('best_month');
           $table->dropColumn('group_size');
           $table->dropColumn('start_end');
        });
    }
}
