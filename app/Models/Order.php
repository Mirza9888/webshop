<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=['user_id','status','total_price'];

    public function user(){
        return $this->belongsTo(Order::class);
    }
    public function orderDetails (){

        return $this->hasMany(OrderDetail::class);
    }
}
