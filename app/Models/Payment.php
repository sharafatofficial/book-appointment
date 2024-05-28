<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'service_id',
        'provider_id',
        'user_id',
        'service_name',
        'date',
        'time',
        'day',
        'price',
        'bank',
        'account_no',
    ];
}
