<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompoundInvestmentActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'investment_id', 'action', 'actor_type', 'actor_id', 'actor_name', 'description', 'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function investment()
    {
        return $this->belongsTo(CompoundInvestment::class, 'investment_id');
    }
}
