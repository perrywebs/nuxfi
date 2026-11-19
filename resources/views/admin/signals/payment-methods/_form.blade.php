@if($errors->any())
    <div class="mb-4">
        <x-admin.alert type="danger" :dismissible="true">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-admin.alert>
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
    <x-admin.form-group label="Method Name" class="mb-2" required helper="e.g. USDT TRC20, Bitcoin, USDT ERC20">
        <input type="text" name="name" value="{{ old('name', $method->name ?? '') }}" required maxlength="100"
               class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
    </x-admin.form-group>

    <x-admin.form-group label="Currency" class="mb-2" required helper="e.g. USDT, BTC, ETH">
        <input type="text" name="currency" value="{{ old('currency', $method->currency ?? '') }}" required maxlength="30"
               class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
    </x-admin.form-group>

    <x-admin.form-group label="Network" class="mb-2" helper="e.g. TRC20, ERC20, Bitcoin">
        <input type="text" name="network" value="{{ old('network', $method->network ?? '') }}" maxlength="50"
               class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
    </x-admin.form-group>

    <x-admin.form-group label="Sort Order" class="mb-2" helper="Lower numbers appear first">
        <input type="number" name="sort_order" value="{{ old('sort_order', $method->sort_order ?? 0) }}" min="0" max="9999"
               class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
    </x-admin.form-group>
</div>

<x-admin.form-group label="Wallet Address" class="mb-4" required>
    <input type="text" name="wallet_address" value="{{ old('wallet_address', $method->wallet_address ?? '') }}" required maxlength="255"
           class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content font-mono focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">
</x-admin.form-group>

<x-admin.form-group label="Payment Instructions (optional)" class="mb-4" helper="Displayed to the user under the wallet address.">
    <textarea name="instructions" rows="3" maxlength="2000"
              class="w-full bg-surface-card border border-border rounded-lg px-3 py-2 text-sm text-content focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary">{{ old('instructions', $method->instructions ?? '') }}</textarea>
</x-admin.form-group>

<x-admin.form-group label="Custom QR Code Image (optional)" class="mb-4" helper="PNG/JPG/WEBP, max 2MB. If omitted, a QR code is generated from the wallet address.">
    @if(!empty($method->qr_code))
        <div class="mb-3 p-2 bg-white rounded-lg inline-block">
            <img src="{{ asset('storage/' . $method->qr_code) }}" alt="Current QR code" class="w-32 h-32 object-contain">
        </div>
    @endif
    <input type="file" name="qr_code" accept="image/png,image/jpeg,image/webp"
           class="block w-full text-sm text-content-secondary file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-primary/10 file:text-primary hover:file:bg-primary/20 transition cursor-pointer">
</x-admin.form-group>

<label class="flex items-center gap-2 mb-6 cursor-pointer">
    <input type="checkbox" name="is_active" value="1"
           {{ old('is_active', $method->is_active ?? true) ? 'checked' : '' }}
           class="w-4 h-4 rounded border-border text-primary focus:ring-primary/30">
    <span class="text-sm text-content">Enable this payment method (visible on the user payment page)</span>
</label>

<div class="flex items-center gap-3">
    <button type="submit" class="inline-flex items-center gap-1.5 bg-primary text-primary-foreground hover:bg-primary-hover rounded-lg px-4 py-2 text-sm font-medium transition-colors">
        {{ $submitLabel ?? 'Save Payment Method' }}
    </button>
    <a href="{{ route('signal-payment-methods.index') }}" class="inline-flex items-center px-4 py-2 rounded-lg border border-border text-sm font-medium text-content-secondary hover:bg-surface-alt transition-colors">
        Cancel
    </a>
</div>
