<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'product_code','short_des', 'price', 'old_price', 'discount_price', 'quantity','image', 'color', 'size'];

}
