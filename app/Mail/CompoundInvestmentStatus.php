<?php

namespace App\Mail;

use App\Models\CompoundInvestment;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompoundInvestmentStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $investment;
    public $user;
    public $type;
    public $reason;
    public $amountCredited;

    /**
     * @param string $type approved|rejected|activated|completed|reopened
     */
    public function __construct(CompoundInvestment $investment, User $user, string $type, ?string $reason = null, float $amountCredited = 0.0)
    {
        $this->investment = $investment;
        $this->user = $user;
        $this->type = $type;
        $this->reason = $reason;
        $this->amountCredited = $amountCredited;
    }

    public function build()
    {
        $subjects = [
            'submitted' => 'Investment request received',
            'approved' => 'Investment request approved',
            'rejected' => 'Investment request declined',
            'activated' => 'Your compound investment is now active',
            'completed' => 'Compound investment completed',
            'reopened' => 'Compound investment reopened',
        ];

        return $this->view('emails.compound-investment-status')
            ->subject(($subjects[$this->type] ?? 'Compound investment update') . ' — ' . $this->investment->reference);
    }
}
