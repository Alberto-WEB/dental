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
        Schema::create('personal_pathologicals', function (Blueprint $table) {
            $table->id();
            $table->boolean('sarampion');
            $table->boolean('rubeola');
            $table->boolean('varicela');
            $table->boolean('parotiditis');
            $table->boolean('tosferina');
            $table->boolean('escarlatina');
            $table->string('other_childern_sicks');
            $table->boolean('hip_art');
            $table->string('hip_art_since');
            $table->string('hip_art_medicaments');
            $table->string('hip_art_status');
            $table->boolean('dia_mell');
            $table->string('dia_mell_since');
            $table->string('dia_mell_medicaments');
            $table->string('dia_mell_status');
            $table->boolean('epilepsia');
            $table->string('epi_since');
            $table->string('epi_medicaments');
            $table->string('epi_status');
            $table->boolean('sida');
            $table->string('sida_since');
            $table->string('sida_medicaments');
            $table->string('sida_status');
            $table->boolean('hep_c');
            $table->string('hep_c_since');
            $table->string('hep_c_medicaments');
            $table->string('hep_c_status');
            $table->boolean('asma');
            $table->string('asma_since');
            $table->string('asma_medicaments');
            $table->string('asma_status');
            $table->boolean('artitris');
            $table->string('artritis_since');
            $table->string('artritis_medicaments');
            $table->string('artritis_status');
            $table->boolean('tiroidismo');
            $table->string('tiroidismos_since');
            $table->string('tiroidismos_medicaments');
            $table->string('tiroidismos_status');
            $table->boolean('cancer');
            $table->string('cancer_since');
            $table->string('cancer_medicaments');
            $table->string('cancer_status');
            $table->boolean('other_actual_sicks');
            $table->string('wath_other_actual_sicks');
            $table->string('wath_other_actual_sicks_medicaments');
            $table->string('wath_other_actual_sicks_status');
            $table->string('alergies');
            $table->boolean('blood_coagulation');
            $table->boolean('kidney_problems');
            $table->string('what_kidney_problems');
            $table->boolean('liver_problems');
            $table->string('what_liver_problems');
            $table->boolean('ets');
            $table->string('wath_ets');
            $table->boolean('surgeries');
            $table->string('surgeries_reason');
            $table->string('blood_transfution');
            $table->string('blood_transfution_reason');
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
        Schema::dropIfExists('personal_pathologicals');
    }
};
