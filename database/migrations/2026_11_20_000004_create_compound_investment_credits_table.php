<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompoundInvestmentCreditsTable extends Migration
{
    public function up()
    {
        Schema::create('compound_investment_credits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('investment_id')->index();
            $table->unsignedBigInteger('user')->index();

            $table->decimal('amount', 16, 2)->default(0);
            $table->decimal('previous_profit', 18, 2)->default(0);
            $table->decimal('new_profit', 18, 2)->default(0);
            $table->decimal('previous_investment_interest', 18, 2)->default(0);
            $table->decimal('new_investment_interest', 18, 2)->default(0);

            $table->string('idempotency_key', 64)->unique();
            $table->text('note')->nullable();
            $table->unsignedBigInteger('credited_by')->nullable();
            $table->string('credited_by_name', 191)->nullable();
            $table->timestamp('credited_at')->nullable();

            $table->timestamps();

            $table->foreign('investment_id')
                ->references('id')
                ->on('compound_investments')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('compound_investment_credits');
    }
}
