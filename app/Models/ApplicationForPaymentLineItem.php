<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationForPaymentLineItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'application_for_payment_id',
        'schedule_of_value_id', 'previous_work_completed', 'previous_stored', 'current_work_completed', 'current_stored'
    ];
}
