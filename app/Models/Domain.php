<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'for',
        'domain',
        'customer',
        'mobile',
        'project',
        'purchase_date',
        'renewal_date',
        'renewal_amount',
        'status',
        'hidden',
    ];

    protected $casts = [
        'purchase_date' => 'datetime',
        'renewal_date' => 'datetime',
    ];
}
