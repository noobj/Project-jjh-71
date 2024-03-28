<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $casts = [
        'borrowed_date' => 'datetime',
        'returned_date' => 'datetime',
    ];
}
