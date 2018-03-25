<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id')->unsigned();
            $table->decimal('order_price',10,2);
            $table->string('status',40)->nullable();

            $table->string('fullname',50)->nullable();
            $table->string('address',200)->nullable();
            $table->string('phone',15)->nullable();
            $table->string('mobile_phone',15)->nullable();

            $table->string('banka',20)->nullable();
            $table->integer('credit_count')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unique('cart_id');
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
