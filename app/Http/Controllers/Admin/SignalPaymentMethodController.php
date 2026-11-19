<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SignalPaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SignalPaymentMethodController extends Controller
{
    public function index()
    {
        $title = 'Signal Payment Wallets';
        $methods = SignalPaymentMethod::withCount('payments')
            ->orderBy('sort_order')
            ->orderBy('name')
            ->paginate(15);

        return view('admin.signals.payment-methods.index', compact('methods', 'title'));
    }

    public function create()
    {
        $title = 'Add Signal Payment Method';
        return view('admin.signals.payment-methods.create', compact('title'));
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);
        $validated['qr_code'] = $this->storeQrCode($request);

        SignalPaymentMethod::create($validated);

        return redirect()
            ->route('signal-payment-methods.index')
            ->with('success', 'Signal payment method created successfully.');
    }

    public function edit(SignalPaymentMethod $signalPaymentMethod)
    {
        $title = 'Edit Signal Payment Method';
        $method = $signalPaymentMethod;

        return view('admin.signals.payment-methods.edit', compact('method', 'title'));
    }

    public function update(Request $request, SignalPaymentMethod $signalPaymentMethod)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('qr_code')) {
            $this->deleteQrCode($signalPaymentMethod->qr_code);
            $validated['qr_code'] = $this->storeQrCode($request);
        }

        $signalPaymentMethod->update($validated);

        return redirect()
            ->route('signal-payment-methods.index')
            ->with('success', 'Signal payment method updated successfully.');
    }

    /**
     * Only allow permanent deletion when no payment records reference the method.
     * Otherwise softly delete it so existing payment history stays intact.
     */
    public function destroy(SignalPaymentMethod $signalPaymentMethod)
    {
        if ($signalPaymentMethod->payments()->exists()) {
            $signalPaymentMethod->delete();

            return redirect()
                ->route('signal-payment-methods.index')
                ->with('success', 'This method is used by existing payment records, so it was archived (disabled) instead of permanently deleted.');
        }

        $this->deleteQrCode($signalPaymentMethod->qr_code);
        $signalPaymentMethod->forceDelete();

        return redirect()
            ->route('signal-payment-methods.index')
            ->with('success', 'Signal payment method deleted successfully.');
    }

    public function toggle(SignalPaymentMethod $signalPaymentMethod)
    {
        $signalPaymentMethod->update([
            'is_active' => !$signalPaymentMethod->is_active,
        ]);

        return redirect()->back()->with(
            'success',
            'Payment method ' . ($signalPaymentMethod->is_active ? 'enabled' : 'disabled') . ' successfully.'
        );
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:100',
            'currency'       => 'required|string|max:30',
            'network'        => 'nullable|string|max:50',
            'wallet_address' => 'required|string|max:255',
            'instructions'   => 'nullable|string|max:2000',
            'sort_order'     => 'nullable|integer|min:0|max:9999',
            'qr_code'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['is_active']  = $request->boolean('is_active');
        $validated['sort_order'] = (int) ($validated['sort_order'] ?? 0);

        return $validated;
    }

    private function storeQrCode(Request $request): ?string
    {
        if (!$request->hasFile('qr_code')) {
            return null;
        }

        return $request->file('qr_code')->store('signal-qr', 'public');
    }

    private function deleteQrCode(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
