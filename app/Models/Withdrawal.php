<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory;

    protected $casts = [
        'broker_commission_amount' => 'float',
        'broker_commission_confirmed' => 'boolean',
        'broker_commission_submitted_at' => 'datetime',
        'broker_commission_confirmed_at' => 'datetime',
    ];

    public function brokerCommissionPayments()
    {
        return $this->hasMany(WithdrawalBrokerCommissionPayment::class, 'withdrawal_id')
            ->orderByDesc('submitted_at');
    }
    
    public function duser(){
    	return $this->belongsTo(User::class , 'user');
    }
}
