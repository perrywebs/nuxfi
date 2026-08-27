<?php

namespace App\Mail;

use App\Models\Card;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreditCardStatus extends Mailable
{
    use Queueable, SerializesModels;

    public $card;
    public $user;
    public $subjectText;

    /**
     * @param  Card   $card      The card application record
     * @param  User   $user      The customer
     * @param  string $subject   Email subject (e.g. "Credit Card Request Approved")
     */
    public function __construct(Card $card, User $user, string $subject)
    {
        $this->card = $card;
        $this->user = $user;
        $this->subjectText = $subject;
    }

    public function build()
    {
        return $this->view('emails.credit-card-status')->subject($this->subjectText);
    }
}
