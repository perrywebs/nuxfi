<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = [
        'user_id',
        'reference_number',
        'fee',
        'delivery_address',
        'status',
        'refunded_at',
    ];

    protected $casts = [
        'fee' => 'float',
        'refunded_at' => 'datetime',
    ];

    // ── Status constants ──────────────────────────────
    public const STATUS_REQUESTED = 'requested';
    public const STATUS_APPROVED = 'approved';
    public const STATUS_DENIED = 'denied';
    public const STATUS_SHIPPED = 'shipped';
    public const STATUS_DELIVERED = 'delivered';

    // Allowed forward transitions (prevents invalid workflow moves).
    public const TRANSITIONS = [
        self::STATUS_REQUESTED => [self::STATUS_APPROVED, self::STATUS_DENIED],
        self::STATUS_APPROVED  => [self::STATUS_SHIPPED],
        self::STATUS_SHIPPED   => [self::STATUS_DELIVERED],
        self::STATUS_DENIED    => [],
        self::STATUS_DELIVERED => [],
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function statusLabels(): array
    {
        return [
            self::STATUS_REQUESTED => 'Requested',
            self::STATUS_APPROVED  => 'Request Approved',
            self::STATUS_DENIED    => 'Denied',
            self::STATUS_SHIPPED   => 'Shipped',
            self::STATUS_DELIVERED => 'Delivered',
        ];
    }

    public function statusLabel(): string
    {
        return self::statusLabels()[$this->status] ?? ucfirst($this->status);
    }

    public function isActive(): bool
    {
        return in_array($this->status, [
            self::STATUS_REQUESTED,
            self::STATUS_APPROVED,
            self::STATUS_SHIPPED,
        ]);
    }

    public function isRefunded(): bool
    {
        return !is_null($this->refunded_at);
    }

    public function canTransitionTo(string $newStatus): bool
    {
        return in_array($newStatus, self::TRANSITIONS[$this->status] ?? []);
    }

    /**
     * Configurable application fee in USD (centralized so the amount is
     * never hardcoded across controllers / views).
     */
    public static function defaultFee(): float
    {
        $settings = Settings::where('id', 1)->first();
        return ($settings && $settings->card_fee) ? (float) $settings->card_fee : 600.00;
    }

    public static function generateReference(): string
    {
        do {
            $ref = 'CARD-' . strtoupper(substr(md5(uniqid() . mt_rand()), 0, 8));
        } while (self::where('reference_number', $ref)->exists());

        return $ref;
    }

    public function scopeActive($query)
    {
        return $query->whereIn('status', [
            self::STATUS_REQUESTED,
            self::STATUS_APPROVED,
            self::STATUS_SHIPPED,
        ]);
    }
}
