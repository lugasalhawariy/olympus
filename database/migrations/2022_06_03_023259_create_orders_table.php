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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->foreignId('customer_id'); #memiliki data customer
            $table->foreignId('agent_id');
            $table->string('payment_method');
            $table->string('payment_link');
            $table->timestamp('payment_date');
            $table->string('buy_by');
            $table->double('payment_total');
            $table->integer('coupon_id')->nullable();
            $table->string('payment_discount_code')->nullable();
            $table->double('payment_discount')->nullable();
            $table->double('payment_final');
            $table->float('order_weight')->nullable();
            $table->float('order_distance')->nullable();
            $table->integer('delivery_status')->nullable();
            $table->double('delivery_fee')->nullable();
            $table->string('delivery_track')->nullable();
            $table->string('delivery_time');
            $table->string('delivery_date');
            $table->timestamp('order_time');
            $table->integer('status')->default(1);

            $table->timestamps();
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
};
