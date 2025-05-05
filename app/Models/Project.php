<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'project_number',
        'address',
        'owner_name',
        'architect_name',
        'contract_amount',
        'contract_date',
        'retainage_percentage',
        'gmp'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'gmp' => 'decimal:2',
    ];
}