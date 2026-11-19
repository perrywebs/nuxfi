<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignalPayment extends Model
{
    use HasFactory;

    public const STATUS_PENDING  = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_REJECTED = 'rejected';

    protected $table = 'signal_payments';

    protected $fillable = [
        'user_id',
        'signal_plan_id',
        'signal_payment_method_id',
        'plan_name',
        'amount',
        'currency',
        'duration',
        'payment_method_name',
        'payment_network',
        'wallet_address',
        'tx_hash',
        'status',
        'rejection_reason',
        'submitted_at',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
        'subscription_id',
    ];

    protected $casts = [
        'amount'        => 'decimal:2',
        'duration'      => 'integer',
        'submitted_at'  => 'datetime',
        'approved_at'   => 'datetime',
        'rejected_at'   => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function signalPlan()
    {
        return $this->belongsTo(SignalPlan::class, 'signal_plan_id');
    }

    public function plan()
    {
        return $this->belongsTo(SignalPlan::class, 'signal_plan_id');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(SignalPaymentMethod::class, 'signal_payment_method_id')->withTrashed();
    }

    public function subscription()
    {
        return $this->belongsTo(SignalSubscription::class, 'subscription_id');
    }

    public function approver()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function rejecter()
    {
        return $this->belongsTo(Admin::class, 'rejected_by');
    }

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isRejected(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    public function statusBadgeClass(): string
    {
        switch ($this->status) {
            case self::STATUS_APPROVED:
                return 'bg-gain/10 text-gain';
            case self::STATUS_REJECTED:
                return 'bg-loss/10 text-loss';
            default:
                return 'bg-warning/10 text-warning';
        }
    }

    public function methodLabel(): string
    {
        if (!$this->payment_method_name) {
            return 'Not selected';
        }

        return trim($this->payment_method_name . ($this->payment_network ? ' (' . $this->payment_network . ')' : ''));
    }
}
