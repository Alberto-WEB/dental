<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->string('spending_hour');
            $table->string('work_price');
            $table->string('bank_commision');
            $table->string('utility');
            $table->string('hour_service_cost');
            $table->string('time_service_hour');
            $table->string('total_cost');

            $table->unsignedBigInteger('dentist_id');
            $table->foreign('dentist_id')->references('id')->on('dentists');

            $table->unsignedBigInteger('consumable_id');
            $table->foreign('consumable_id')->references('id')->on('consumables');

            $table->unsignedBigInteger('expense_hours_id');
            $table->foreign('expense_hours_id')->references('id')->on('expense_hours');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
};
