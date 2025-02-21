<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    use HasFactory;
    /**
     * Summary of table
     * @var string
     */
    protected $table = 'contact_information';
    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
        'mobile',
        'address',
        'office_location',
    ];
}
