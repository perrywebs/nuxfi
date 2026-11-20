<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ChangeUsersRoiToDecimal extends Migration
{
    public function up()
    {
        // Existing balances are retained when widening the Total Profit field
        // to support fractional cryptocurrency-related interest credits.
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE users MODIFY roi DECIMAL(16,2) NOT NULL DEFAULT 0');
        }
    }

    public function down()
    {
        // Rollback follows the original legacy column type. Fractional cents
        // will be rounded by the database if a rollback is explicitly run.
        if (DB::getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE users MODIFY roi INT NOT NULL DEFAULT 0');
        }
    }
}
