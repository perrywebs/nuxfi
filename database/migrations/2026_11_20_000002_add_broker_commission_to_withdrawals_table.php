<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrokerCommissionToWithdrawalsTable extends Migration
{
    public function up()
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            $table->decimal('broker_commission_amount', 24, 8)->nullable();
            $table->string('broker_commission_currency', 20)->nullable();
            $table->string('broker_commission_wallet', 191)->nullable();
            $table->string('broker_commission_payment_reference', 191)->nullable();
            $table->timestamp('broker_commission_submitted_at')->nullable();
            $table->boolean('broker_commission_confirmed')->default(false);
            $table->unsignedBigInteger('broker_commission_verified_by')->nullable();
            $table->timestamp('broker_commission_confirmed_at')->nullable();
        });
    }

    public function down()
    {
        Schema::table('withdrawals', function (Blueprint $table) {
            $table->dropColumn([
                'broker_commission_amount',
                'broker_commission_currency',
                'broker_commission_wallet',
                'broker_commission_payment_reference',
                'broker_commission_submitted_at',
                'broker_commission_confirmed',
                'broker_commission_verified_by',
                'broker_commission_confirmed_at',
            ]);
        });
    }
}
