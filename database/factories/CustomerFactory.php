<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\User;
use phpDocumentor\Reflection\Types\Nullable;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
   
    protected $model = Customer::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween($min = 1, $max = 10),
            'referral_id' => 'CS_'.Str::random(10),
            'address' => $this->faker->streetAddress,
            'kelurahan' => 'Tamanan Wetan',
            'kecamatan' => 'Banguntapan',
            'kota' => 'Bantul',
            'provinsi' => 'Yogyakarta',
            'latitude' => 100,
            'longitude' => -100,
            'kode_pos' => $this->faker->postcode,
            'no_rekening' => mt_rand(1000000000, 9999999999),
            'buku_rekening' => mt_rand(1000000000, 9999999999)
        ];
    }
}
