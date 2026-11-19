<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('user_signal_subscriptions', function (Blueprint $table) {
            if (!Schema::hasColumn('user_signal_subscriptions', 'starts_at')) {
                $table->timestamp('starts_at')->nullable()->after('signal_plan_id');
            }
        });
    }

    public function down()
    {
        Schema::table('user_signal_subscriptions', function (Blueprint $table) {
            if (Schema::hasColumn('user_signal_subscriptions', 'starts_at')) {
                $table->dropColumn('starts_at');
            }
        });
    }
};
