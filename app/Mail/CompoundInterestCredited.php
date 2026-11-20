<?php

namespace App\Mail;

use App\Models\CompoundInvestment;
use App\Models\CompoundInvestmentCredit;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CompoundInterestCredited extends Mailable
{
    use Queueable, SerializesModels;

    public $investment;
    public $credit;
    public $user;

    public function __construct(CompoundInvestment $investment, CompoundInvestmentCredit $credit, User $user)
    {
        $this->investment = $investment;
        $this->credit = $credit;
        $this->user = $user;
    }

    public function build()
    {
        return $this->view('emails.compound-interest-credited')
            ->subject('Compound interest top-up added – ' . $this->investment->reference);
    }
}
