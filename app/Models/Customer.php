<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'user_id', 'referral_id', 'address', 'kelurahan', 
        'kecamatan', 'kota', 'provinsi', 'kode_pos', 'latitude', 
        'longitude', 'no_rekening', 'buku_rekening', 'point'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
