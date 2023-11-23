<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'email',
        'user_id',
        'cart_id',
        'total_price',
        'discounted_price',
        'shipment_status',
        'return_reason',
        'address',
        'city',
        'postal_code',
        'country',
        'payment_method',
        'payment_status',
        'ordered_at',
    ];

    public function user()
    {
        return $this->belongsTo(Order::class);
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }
}
