<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddServeSinceAndRegdNoAndProfileImageAndNameToContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('serve_since')->nullable()->after('map_url');
            $table->string('regd_no')->nullable()->after('serve_since');
            $table->string('name')->nullable()->after('regd_no');
            $table->string('profile_image')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('serve_since');
            $table->dropColumn('regd_no');
            $table->dropColumn('name');
            $table->dropColumn('profile_image');
        });
    }
}
