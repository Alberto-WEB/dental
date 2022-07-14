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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('age');
            $table->string('sex');
            $table->string('address');
            $table->string('civil_status');
            $table->string('religion');
            $table->string('occupation');
            $table->string('phone');
            $table->string('email_patient')->unique();
            $table->softDeletes();
            //$table->enum('status', ['ACTIVE', 'INACTIVE', 'DELETED'])->default('ACTIVE');
            $table->timestamps();

            $table->unsignedBigInteger('dentist_id');
            $table->foreign('dentist_id')->references('id')->on('dentists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
};
