<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSewa extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id', 'car_name', 'name', 'email', 'whatsapp', 'address', 'start_date', 'end_date',
    ];
}

