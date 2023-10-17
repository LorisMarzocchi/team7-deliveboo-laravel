<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name", 50);
            $table->string('slug', 50)->unique();
            $table->text("ingredients");
            $table->decimal('price', 6, 2);
            $table->text("description");
            $table->text("url_image")->nullable();
            $table->boolean("visible")->default(true);
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
};
