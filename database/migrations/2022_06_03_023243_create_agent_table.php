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
        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->string('store_name');
            $table->string('partner_id');
            $table->string('pin_lok');
            $table->time('store_open');
            $table->time('store_close');
            $table->Text('address');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('ktp');
            $table->string('kk');
            $table->string('npwp');
            $table->integer('point');
            $table->double('credit_limit');
            $table->string('subcription');
            $table->integer('max_load');
            $table->integer('default_agent');
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
        Schema::dropIfExists('agent');
    }
};
