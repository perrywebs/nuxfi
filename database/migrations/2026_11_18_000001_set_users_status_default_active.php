<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SetUsersStatusDefaultActive extends Migration
{
    /**
     * New accounts are active by default. Existing rows are not modified so
     * administrators can review any legacy "blocked" accounts first; the
     * application already treats every non-"active" value as inactive.
     *
     * @return void
     */
    public function up()
    {
        $driver = Schema::getConnection()->getDriverName();

        if ($driver === 'mysql' || $driver === 'mariadb') {
            DB::statement("ALTER TABLE `users` MODIFY `status` VARCHAR(25) NULL DEFAULT 'active'");
        } elseif ($driver === 'pgsql') {
            DB::statement("ALTER TABLE users ALTER COLUMN status SET DEFAULT 'active'");
        }
        // SQLite cannot change a column default without rebuilding the table.
        // Its status column is written explicitly by every account creation
        // path, so the legacy default has no effect there.
    }

    /**
     * The previous default ("blocked") would make newly created accounts
     * inactive, so it is intentionally not restored.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
