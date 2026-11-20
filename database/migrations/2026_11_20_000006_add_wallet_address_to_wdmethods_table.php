<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWalletAddressToWdmethodsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('wdmethods', 'wallet_address')) {
            Schema::table('wdmethods', function (Blueprint $table) {
                $table->string('wallet_address', 191)->nullable();
            });
        }
    }

    public function down()
    {
        // Leave the wallet address column in place: the legacy payment
        // settings code already uses it, and this migration may have found it
        // pre-existing in an installation upgraded outside Laravel migrations.
    }
}
