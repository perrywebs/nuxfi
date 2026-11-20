<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WithdrawalBrokerCommissionPayment extends Model
{
    protected $fillable = [
        'withdrawal_id',
        'user_id',
        'payment_reference',
        'status',
        'rejection_reason',
        'reviewed_by',
        'reviewed_by_name',
        'submitted_at',
        'reviewed_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'reviewed_at' => 'datetime',
    ];

    public function withdrawal()
    {
        return $this->belongsTo(Withdrawal::class, 'withdrawal_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
