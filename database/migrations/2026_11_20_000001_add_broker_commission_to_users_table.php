<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrokerCommissionToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('broker_commission_enabled')->default(false)->after('code5_label');
            $table->decimal('broker_commission_amount', 24, 8)->nullable()->after('broker_commission_enabled');
            $table->string('broker_commission_currency', 20)->nullable()->after('broker_commission_amount');
            $table->string('broker_commission_wallet', 191)->nullable()->after('broker_commission_currency');
            $table->string('broker_commission_note', 255)->nullable()->after('broker_commission_wallet');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'broker_commission_enabled',
                'broker_commission_amount',
                'broker_commission_currency',
                'broker_commission_wallet',
                'broker_commission_note',
            ]);
        });
    }
}
