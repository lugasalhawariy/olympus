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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique(); #memiliki data user
            $table->string('referral_id');
            $table->string('address');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kode_pos');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('no_rekening');
            $table->string('buku_rekening');
            $table->integer('point')->default(100); #bonus point pengguna baru
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
        Schema::dropIfExists('customer');
    }
};
