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
        Schema::create('inherit_families', function (Blueprint $table) {
            $table->id();
            $table->boolean('f_alive');
            $table->string('f_sicks')->nullable();
            $table->boolean('m_alive');
            $table->string('m_sicks')->nullable();
            $table->boolean('pa_gf_alive');
            $table->string('pa_gf_sicks')->nullable();
            $table->boolean('ma_gm_alive');
            $table->string('ma_gm_sicks')->nullable();
            $table->string('others_alive')->nullable();
            $table->string('others_sicks')->nullable();
            $table->boolean('pa_gm_alive');
            $table->string('pa_gm_sicks')->nullable();
            $table->boolean('ma_gf_alive');
            $table->string('ma_gf_sicks')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inherit_families');
    }
};
