<?php

namespace App\Http\Livewire\User;

use App\Models\SignalPlan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SubscribeToSignal extends Component
{
    public $planId;
    public $amount;
    public $hasSubscribe;
    public $plans;

    public function mount()
    {
        $this->planId = '';
        $this->hasSubscribe = false;
        $this->plans = SignalPlan::all();
    }

    public function render()
    {
        return view('livewire.user.subscribe-to-signal');
    }

    public function calculate()
    {
        if ($this->planId && $this->planId !== 'Choose') {
            $plan = SignalPlan::find($this->planId);
            $this->amount = $plan ? $plan->price : '';
        } else {
            $this->amount = '';
        }
    }

    public function subscribe()
    {
        $plan = SignalPlan::find($this->planId);

        if (!$plan) {
            session()->flash('message', 'Please select a valid plan.');
            return;
        }

        $user = User::find(Auth::id());

        if (!$user) {
            session()->flash('message', 'Please sign in to continue.');
            return;
        }

        // Manual crypto payment: never deduct from the internal wallet.
        $payment = app(\App\Services\SignalPaymentService::class)->createRequest($user, $plan);

        return redirect()->route('user.signal.payment.show', $payment->id);
    }
}
