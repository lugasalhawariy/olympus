<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';
    protected $fillable = [
        'invoice_id', 'customer_id', 'agent_id', 'payment_method', 'payment_link',
        'payment_date', 'buy_by', 'payment_total', 'coupon_id', 'payment_discount_code',
        'payment_discount', 'payment_final', 'order_weight', 'order_distance', 'delivery_status',
        'delivery_fee', 'delivery_track', 'delivery_time', 'delivery_date', 'order_time', 'status'
    ];
}
