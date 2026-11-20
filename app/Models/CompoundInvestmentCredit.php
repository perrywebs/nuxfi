<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompoundInvestmentCredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'investment_id', 'user', 'amount', 'previous_profit', 'new_profit',
        'previous_investment_interest', 'new_investment_interest',
        'idempotency_key', 'note', 'credited_by', 'credited_by_name', 'credited_at',
    ];

    protected $casts = [
        'amount' => 'float',
        'previous_profit' => 'float',
        'new_profit' => 'float',
        'previous_investment_interest' => 'float',
        'new_investment_interest' => 'float',
        'credited_at' => 'datetime',
    ];

    public function investment()
    {
        return $this->belongsTo(CompoundInvestment::class, 'investment_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
