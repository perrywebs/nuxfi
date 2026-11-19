<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('signal_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('signal_plan_id')->nullable()->constrained('signal_plans')->nullOnDelete();
            $table->foreignId('signal_payment_method_id')->nullable()->constrained('signal_payment_methods')->nullOnDelete();

            // Snapshots — the amount/plan/method cannot be altered by the user later.
            $table->string('plan_name');
            $table->decimal('amount', 15, 2);
            $table->string('currency', 12)->default('USD');
            $table->unsignedInteger('duration')->default(1); // plan duration snapshot (weeks)
            $table->string('payment_method_name')->nullable();
            $table->string('payment_network')->nullable();
            $table->string('wallet_address')->nullable();

            $table->string('tx_hash', 191)->nullable()->unique();
            $table->string('status', 20)->default('pending');
            $table->text('rejection_reason')->nullable();
            $table->timestamp('submitted_at')->nullable();

            $table->unsignedBigInteger('approved_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->unsignedBigInteger('rejected_by')->nullable();
            $table->timestamp('rejected_at')->nullable();

            $table->foreignId('subscription_id')->nullable()
                ->constrained('user_signal_subscriptions')->nullOnDelete();

            $table->timestamps();

            $table->index(['user_id', 'status']);
            $table->index(['status', 'created_at']);
            $table->index('signal_payment_method_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('signal_payments');
    }
};
