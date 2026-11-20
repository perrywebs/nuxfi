<?php

namespace App\Models;

use App\Services\CompoundInterestCalculator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompoundInvestment extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_COMPLETED = 'completed';
    public const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'reference', 'submission_key', 'user', 'status',
        'starting_amount', 'period_return_rate', 'duration_value', 'duration_unit',
        'recurring_topup', 'recurring_frequency',
        'projected_final_amount', 'projected_interest',
        'deposit_amount', 'payment_method', 'payment_currency', 'payment_network',
        'payment_reference', 'wallet_address', 'proof',
        'total_interest_credited',
        'total_interest_transferred', 'interest_transferred_at',
        'total_profit_before_completion', 'total_profit_after_completion',
        'completed_by', 'completed_by_name',
        'approved_at', 'activated_at', 'completed_at', 'rejected_at',
        'start_date', 'end_date', 'reopen_allowed',
        'reviewed_by', 'reviewed_by_name', 'rejection_reason', 'admin_note', 'user_note',
    ];

    protected $casts = [
        'starting_amount' => 'float',
        'period_return_rate' => 'float',
        'duration_value' => 'float',
        'recurring_topup' => 'float',
        'projected_final_amount' => 'float',
        'projected_interest' => 'float',
        'deposit_amount' => 'float',
        'total_interest_credited' => 'float',
        'total_interest_transferred' => 'float',
        'total_profit_before_completion' => 'float',
        'total_profit_after_completion' => 'float',
        'reopen_allowed' => 'boolean',
        'approved_at' => 'datetime',
        'activated_at' => 'datetime',
        'completed_at' => 'datetime',
        'interest_transferred_at' => 'datetime',
        'rejected_at' => 'datetime',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public static function statusLabels(): array
    {
        return [
            self::STATUS_PENDING => 'Pending Payment Approval',
            self::STATUS_APPROVED => 'Approved',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_COMPLETED => 'Completed',
            self::STATUS_REJECTED => 'Rejected',
        ];
    }

    public function statusLabel(): string
    {
        return self::statusLabels()[$this->status] ?? ucfirst((string) $this->status);
    }

    public function statusBadgeType(): string
    {
        switch ($this->status) {
            case self::STATUS_ACTIVE:
            case self::STATUS_COMPLETED:
                return 'success';
            case self::STATUS_REJECTED:
                return 'danger';
            case self::STATUS_APPROVED:
                return 'info';
            default:
                return 'warning';
        }
    }

    public function isPending(): bool
    {
        return $this->status === self::STATUS_PENDING;
    }

    public function isApproved(): bool
    {
        return $this->status === self::STATUS_APPROVED;
    }

    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isCompleted(): bool
    {
        return $this->status === self::STATUS_COMPLETED;
    }

    public function isRejected(): bool
    {
        return $this->status === self::STATUS_REJECTED;
    }

    /** Only active investments can receive interest. */
    public function canReceiveInterest(): bool
    {
        return $this->isActive()
            && (!$this->end_date || !today()->gt($this->end_date));
    }

    public function canBeCompleted(): bool
    {
        return $this->isActive();
    }

    public function canBeReopened(): bool
    {
        return $this->isCompleted() && $this->reopen_allowed;
    }

    public function durationLabel(): string
    {
        return CompoundInterestCalculator::describeDuration((float) $this->duration_value, $this->duration_unit);
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function credits()
    {
        return $this->hasMany(CompoundInvestmentCredit::class, 'investment_id')->orderByDesc('credited_at');
    }

    public function activities()
    {
        return $this->hasMany(CompoundInvestmentActivity::class, 'investment_id')->orderByDesc('created_at');
    }

    public function scopeForUser($query, $userId)
    {
        return $query->where('user', $userId);
    }

    public function scopeStatus($query, $status)
    {
        return $status ? $query->where('status', $status) : $query;
    }

    /**
     * Generate a unique, human-readable reference.
     */
    public static function generateReference(): string
    {
        do {
            $reference = 'CI-' . strtoupper(bin2hex(random_bytes(4))) . '-' . now()->format('ymd');
        } while (self::where('reference', $reference)->exists());

        return $reference;
    }

    public function logActivity(string $action, string $description, array $meta = [], ?string $actorType = 'system', $actorId = null, ?string $actorName = null): CompoundInvestmentActivity
    {
        return $this->activities()->create([
            'action' => $action,
            'actor_type' => $actorType,
            'actor_id' => $actorId,
            'actor_name' => $actorName,
            'description' => $description,
            'meta' => $meta ?: null,
        ]);
    }
}
