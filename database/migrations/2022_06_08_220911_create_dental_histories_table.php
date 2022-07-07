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
        Schema::create('dental_histories', function (Blueprint $table) {
            $table->id();
            $table->string('reason_medical_visit')->nullable();
            $table->boolean('medications');
            $table->string('wath_medication')->nullable();
            $table->boolean('dental_trauma');
            $table->string('wath_dental_trauma')->nullable();
            $table->boolean('speaking_difficulty');
            $table->boolean('chewing_difficulty');
            $table->boolean('openning_the_mounth_difficulty');
            $table->boolean('have_pain');
            $table->string('where_is_pain')->nullable();
            $table->string('caused_by')->nullable();
            $table->string('pain_type')->nullable();
            $table->string('calms_with')->nullable();
            $table->boolean('gums_bleed');
            $table->boolean('abnormal_lips');
            $table->string('abnormal_lips_linjury')->nullable();
            $table->boolean('abnormal_cheeks');
            $table->string('abnormal_cheeks_injury')->nullable();
            $table->boolean('abnormal_gums');
            $table->string('abnormal_gums_ingury')->nullable();
            $table->boolean('abnormal_palate');
            $table->string('abnormal_palate_injury')->nullable();
            $table->boolean('abnormal_tongue');
            $table->string('abnormal_tongue_injury')->nullable();
            $table->boolean('abnormal_under_tongue');
            $table->string('abnormal_under_tongue_injury')->nullable();
            $table->string('anywhere_else_abnormal')->nullable();
            $table->string('how_is_injury')->nullable();
            $table->boolean('injury_has_pus');
            $table->string('when_has_pus')->nullable();
            $table->boolean('has_ulcers');
            $table->string('when_has_ulcers')->nullable();
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
        Schema::dropIfExists('dental_histories');
    }
};
