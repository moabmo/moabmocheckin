<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $table = 'trainees';
    protected $fillable = [
        'id',
        'polling_station',
        'name',
        'national_id',
        'phone',
        'ward',
        'admitted',
        'admitted_at',
        'admitted_by',

    ];
}


