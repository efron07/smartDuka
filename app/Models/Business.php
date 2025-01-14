<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'physical_location',
        'email',
        'telephone_number',
        'tin',
        'vrn',
        'po_box',
        'footer_description',
        'period',
        'logo',
    ];
}
