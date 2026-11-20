<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateCompoundCompletionAndBrokerPaymentReviews extends Migration
{
    public function up()
    {
        Schema::table('compound_investments', function (Blueprint $table) {
            if (!Schema::hasColumn('compound_investments', 'total_interest_transferred')) {
                $table->decimal('total_interest_transferred', 18, 2)->default(0);
            }
            if (!Schema::hasColumn('compound_investments', 'interest_transferred_at')) {
                $table->timestamp('interest_transferred_at')->nullable();
            }
            if (!Schema::hasColumn('compound_investments', 'completed_by')) {
                $table->unsignedBigInteger('completed_by')->nullable();
            }
            if (!Schema::hasColumn('compound_investments', 'completed_by_name')) {
                $table->string('completed_by_name', 191)->nullable();
            }
            if (!Schema::hasColumn('compound_investments', 'total_profit_before_completion')) {
                $table->decimal('total_profit_before_completion', 18, 2)->nullable();
            }
            if (!Schema::hasColumn('compound_investments', 'total_profit_after_completion')) {
                $table->decimal('total_profit_after_completion', 18, 2)->nullable();
            }
        });

        Schema::table('withdrawals', function (Blueprint $table) {
            if (!Schema::hasColumn('withdrawals', 'broker_commission_note')) {
                $table->string('broker_commission_note', 255)->nullable();
            }
            if (!Schema::hasColumn('withdrawals', 'broker_commission_status')) {
                $table->string('broker_commission_status', 20)->default('not_required');
            }
            if (!Schema::hasColumn('withdrawals', 'broker_commission_rejection_reason')) {
                $table->text('broker_commission_rejection_reason')->nullable();
            }
        });

        if (!Schema::hasTable('withdrawal_broker_commission_payments')) {
            Schema::create('withdrawal_broker_commission_payments', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('withdrawal_id')->index();
                $table->unsignedBigInteger('user_id')->index();
                $table->string('payment_reference', 191);
                $table->string('status', 20)->default('submitted')->index();
                $table->text('rejection_reason')->nullable();
                $table->unsignedBigInteger('reviewed_by')->nullable();
                $table->string('reviewed_by_name', 191)->nullable();
                $table->timestamp('submitted_at')->nullable();
                $table->timestamp('reviewed_at')->nullable();
                $table->timestamps();

                $table->foreign('withdrawal_id')
                    ->references('id')
                    ->on('withdrawals')
                    ->onDelete('cascade');
            });
        }

        // Older versions credited every individual top-up to Total Profit.
        // Mark those existing credits as already transferred so the new
        // completion payout cannot pay them a second time.
        if (Schema::hasTable('compound_investment_credits')) {
            DB::table('compound_investments')->orderBy('id')->chunk(100, function ($investments) {
                foreach ($investments as $investment) {
                    $credits = DB::table('compound_investment_credits')
                        ->where('investment_id', $investment->id);
                    $sum = (float) $credits->sum('amount');
                    if ($sum <= 0) {
                        continue;
                    }

                    $transferred = min($sum, (float) $investment->total_interest_credited);
                    DB::table('compound_investments')
                        ->where('id', $investment->id)
                        ->update([
                            'total_interest_transferred' => $transferred,
                            'interest_transferred_at' => DB::table('compound_investment_credits')
                                ->where('investment_id', $investment->id)
                                ->max('credited_at'),
                        ]);
                }
            });
        }

        // Preserve in-flight broker payment submissions created before the
        // review-attempt history table was introduced.
        if (Schema::hasColumn('withdrawals', 'broker_commission_payment_reference')) {
            DB::table('withdrawals')
                ->where('broker_commission_confirmed', true)
                ->update(['broker_commission_status' => 'approved']);

            DB::table('withdrawals')
                ->where('broker_commission_confirmed', false)
                ->whereNotNull('broker_commission_payment_reference')
                ->orderBy('id')
                ->get()
                ->each(function ($withdrawal) {
                    DB::table('withdrawal_broker_commission_payments')->insert([
                        'withdrawal_id' => $withdrawal->id,
                        'user_id' => $withdrawal->user,
                        'payment_reference' => $withdrawal->broker_commission_payment_reference,
                        'status' => 'submitted',
                        'submitted_at' => $withdrawal->broker_commission_submitted_at ?: $withdrawal->created_at,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    DB::table('withdrawals')->where('id', $withdrawal->id)
                        ->update(['broker_commission_status' => 'submitted']);
                });
        }
    }

    public function down()
    {
        Schema::dropIfExists('withdrawal_broker_commission_payments');

        Schema::table('withdrawals', function (Blueprint $table) {
            $columns = [];
            foreach (['broker_commission_note', 'broker_commission_status', 'broker_commission_rejection_reason'] as $column) {
                if (Schema::hasColumn('withdrawals', $column)) {
                    $columns[] = $column;
                }
            }
            if ($columns) {
                $table->dropColumn($columns);
            }
        });

        Schema::table('compound_investments', function (Blueprint $table) {
            $columns = [];
            foreach ([
                'total_interest_transferred',
                'interest_transferred_at',
                'completed_by',
                'completed_by_name',
                'total_profit_before_completion',
                'total_profit_after_completion',
            ] as $column) {
                if (Schema::hasColumn('compound_investments', $column)) {
                    $columns[] = $column;
                }
            }
            if ($columns) {
                $table->dropColumn($columns);
            }
        });
    }
}
