<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'aboutus';

    protected $fillable = [
        'our_mission',
        'our_vision',
        'our_privacy',
        'our_policy',
    ];
}
