<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';

    use HasFactory;

    protected $casts = [
        'available_at' => 'datetime',
        'created_at' => 'datetime',
    ];
}
