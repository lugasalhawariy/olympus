<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        \App\Models\User::factory(20)->create();

        // DATA LOGIN SUPERADMIN
        \App\Models\User::factory()->create([
            'first_name' => 'Lugas',
            'last_name' => 'Alhawariy',
            'email' => 'lugasdev@example.com',
            'password' => Hash::make('lugasdev'),
            'pin' => '000000',
            'phone' => '087719110891',
            'account_type' => 'superadmin',
            'account_status' => 'active',
            'last_login' => now()
        ]);

        $this->call(IndoRegionSeeder::class);
    }
}
