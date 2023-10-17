<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->decimal('total_price', 6, 2);
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('email');
            $table->string('message', 200)->nullable();
            $table->dateTime('payment_date')->nullable();
            $table->unsignedBigInteger('restaurant_id');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
        });
    }
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
