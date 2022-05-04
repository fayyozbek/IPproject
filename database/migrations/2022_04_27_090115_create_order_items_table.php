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
        Schema::create('order_items', function (Blueprint $table) {
            $table->integer('order_id');
            $table->integer('pizza_id');
            $table->integer('quantity');
            $table->integer('size');
            $table->integer('type');
            $table->integer('price');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('pizza_id')->references('id')->on('pizzas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
