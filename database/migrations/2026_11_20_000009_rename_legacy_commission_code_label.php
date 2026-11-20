<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class RenameLegacyCommissionCodeLabel extends Migration
{
    public function up()
    {
        DB::table('users')
            ->where('code1_label', 'Broker Commission Fee Code')
            ->update(['code1_label' => 'Withdrawal Verification Code']);
    }

    public function down()
    {
        DB::table('users')
            ->where('code1_label', 'Withdrawal Verification Code')
            ->update(['code1_label' => 'Broker Commission Fee Code']);
    }
}
