<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompoundInvestmentActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('compound_investment_activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('investment_id')->index();

            $table->string('action', 40)->index();
            $table->string('actor_type', 20)->default('system');
            $table->unsignedBigInteger('actor_id')->nullable();
            $table->string('actor_name', 191)->nullable();
            $table->text('description')->nullable();
            $table->json('meta')->nullable();

            $table->timestamps();

            $table->foreign('investment_id')
                ->references('id')
                ->on('compound_investments')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('compound_investment_activities');
    }
}
