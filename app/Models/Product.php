<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'name','quantity', 'description', 'price', 'image','is_discounted','discounted_price'];

    public function category(){
        return $this->belongsTo(Category::class);

    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }

}




