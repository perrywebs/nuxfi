<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompoundInvestmentsTable extends Migration
{
    public function up()
    {
        Schema::create('compound_investments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference', 40)->unique();
            $table->uuid('submission_key')->unique();
            $table->unsignedBigInteger('user')->index();

            $table->string('status', 20)->default('pending')->index();

            // Scenario captured when the request was submitted.
            $table->decimal('starting_amount', 16, 2)->default(0);
            $table->decimal('period_return_rate', 8, 2)->default(27.80);
            $table->decimal('duration_value', 8, 2)->default(1);
            $table->string('duration_unit', 10)->default('monthly');
            $table->decimal('recurring_topup', 16, 2)->default(0);
            $table->string('recurring_frequency', 10)->default('monthly');

            // Server-side projections (never trusted from the browser).
            $table->decimal('projected_final_amount', 18, 2)->default(0);
            $table->decimal('projected_interest', 18, 2)->default(0);

            // Funding details.
            $table->decimal('deposit_amount', 16, 2)->default(0);
            $table->string('payment_method', 100)->nullable();
            $table->string('payment_currency', 40)->nullable();
            $table->string('payment_network', 80)->nullable();
            $table->string('payment_reference', 191)->nullable();
            $table->string('wallet_address', 191)->nullable();
            $table->string('proof', 191)->nullable();

            // Lifecycle.
            $table->decimal('total_interest_credited', 18, 2)->default(0);
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->boolean('reopen_allowed')->default(true);

            $table->unsignedBigInteger('reviewed_by')->nullable();
            $table->string('reviewed_by_name', 191)->nullable();
            $table->text('rejection_reason')->nullable();
            $table->text('admin_note')->nullable();
            $table->text('user_note')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('compound_investments');
    }
}
