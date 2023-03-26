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
        Schema::create('ordersdetails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('items_id')->unsigned();
            $table->integer('quantity');
            $table->string('price');
            $table->string('totalprice');

            $table->timestamps();


            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('items_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordersdetails');
    }
};
