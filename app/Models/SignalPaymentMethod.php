<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SignalPaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'signal_payment_methods';

    protected $fillable = [
        'name',
        'currency',
        'network',
        'wallet_address',
        'qr_code',
        'instructions',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function payments()
    {
        return $this->hasMany(SignalPayment::class, 'signal_payment_method_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getDisplayNameAttribute(): string
    {
        return trim($this->name . ($this->network ? ' (' . $this->network . ')' : ''));
    }
}
