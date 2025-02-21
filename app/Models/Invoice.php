<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'name',
        'email',
        'mobile',
        'address',
        'location',
        'total_price',
        'status' 
    ];

    // Define relationships
    public function invoice_products()
    {
        return $this->hasMany(InvoiceProduct::class, 'invoice_id');
    }
}
