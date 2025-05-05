<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralCondition extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'staff_id',
        'type',
        'description',
        'amount',
        'date',
        'hours_worked',
    ];
}