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
        Schema::create('no_personal_pathologicals', function (Blueprint $table) {
            $table->id();
            $table->boolean('drugs');
            $table->string('drugs_take');
            $table->boolean('smoke');
            $table->string('smoke_frequency');
            $table->boolean('alcohol');
            $table->string('alcohol_frequency');
            $table->boolean('pregnant');
            $table->string('pregnant_weeks');
            $table->string('pregnancy_number');
            $table->date('d_p_p');
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
        Schema::dropIfExists('no_personal_pathologicals');
    }
};
