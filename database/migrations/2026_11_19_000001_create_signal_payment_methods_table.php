<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('signal_payment_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g. USDT TRC20
            $table->string('currency', 30)->nullable(); // e.g. USDT, BTC
            $table->string('network', 50)->nullable(); // e.g. TRC20, ERC20, Bitcoin
            $table->string('wallet_address')->nullable();
            $table->string('qr_code')->nullable(); // uploaded QR image path (public disk)
            $table->text('instructions')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('signal_payment_methods');
    }
};
