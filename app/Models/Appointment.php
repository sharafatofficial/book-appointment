<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'user_id',
        'service_id',
        'provider_id',
        'date',
        'duration',
        'service_name', // Note: This seems like a typo. It should be 'service_name'.
        'day',
        'time',
        'price',
        'notes',
        'status',
        'paymentstatus',
    ];
}
