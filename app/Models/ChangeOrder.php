<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChangeOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'co_number',
        'description',
        'amount',
        'status',
        'date_approved',
    ];
}