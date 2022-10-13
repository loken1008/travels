<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugAndImgAltAndMetaTitleAndMetaKeywordsAndMetaDescriptionToBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('slug')->after('blog_title');
            $table->string('img_alt')->after('blog_image')->nullable();
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
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('slug');
            $table->dropColumn('img_alt');
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_description');
        });
    }
}
