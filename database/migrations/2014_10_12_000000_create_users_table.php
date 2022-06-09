<?php

use Carbon\Carbon;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('pin'); #max: 6, min: 6
            $table->string('phone'); #max: 13
            $table->enum('account_type', ['superadmin', 'customer', 'agent'])->default('customer');
            $table->string('photo')->nullable();
            $table->timestamp('last_login')->default(Carbon::now());
            $table->string('device_token')->default(request()->ip())->nullable();
            $table->enum('account_status', ['active', 'inactive'])->default('inactive');
            $table->timestamp('phone_verified_at')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
