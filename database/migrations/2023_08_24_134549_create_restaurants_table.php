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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('slug', 50)->unique();
            $table->text('description');
            $table->string('city', 30);
            $table->string('address', 50);
            $table->string('vat', 10);
            $table->string('url_image', 300)->nullable();
            $table->smallInteger('priceRange')->nullable();
            $table->tinyInteger('rating_value')->nullable();
            $table->smallInteger('review_count')->nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');

        // Schema::table('restaurants', function (Blueprint $table) {
        //     $table->dropForeign(['user_id']);
        //     $table->dropColumn('user_id');
        // });
    }
};
