<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignalSubscription extends Model
{
    use HasFactory;

    protected $table = 'user_signal_subscriptions'; // Explicitly define the table name

    protected $fillable = [
        'user_id',
        'signal_plan_id',
        'starts_at',
        'expires_at',
        'status'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function signalPlan()
    {
        return $this->belongsTo(SignalPlan::class);
    }
    public function plan()
{
    return $this->belongsTo(SignalPlan::class, 'signal_plan_id');
}

    public function payment()
    {
        return $this->hasOne(SignalPayment::class, 'subscription_id');
    }
}
