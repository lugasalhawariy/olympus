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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id'); #memiliki data category
            $table->string('product_name');
            $table->string('type');
            $table->string('item');
            $table->float('weight');
            $table->string('sku');
            $table->double('price_sell');
            $table->double('price_promo');
            $table->double('price_agent');
            $table->string('photo');
            $table->string('recommendation');
            $table->Text('description');
            $table->string('status')->default('active');
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
        Schema::dropIfExists('product');
    }
};
