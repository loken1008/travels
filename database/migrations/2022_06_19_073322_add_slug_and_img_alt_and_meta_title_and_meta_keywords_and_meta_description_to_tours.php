<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugAndImgAltAndMetaTitleAndMetaKeywordsAndMetaDescriptionToTours extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->string('slug')->after('tour_name');
            $table->string('img_alt')->after('mainImage')->nullable();
            $table->string('meta_title')->after('status')->nullable();
            $table->longText('meta_keywords')->after('meta_title')->nullable();
            $table->longText('meta_description')->after('meta_keywords')->nullable();

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
            $table->dropColumn('slug');
            $table->dropColumn('img_alt');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
        });
    }
}
