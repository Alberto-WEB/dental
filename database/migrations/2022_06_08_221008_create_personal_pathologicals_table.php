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
            $table->string('other_childern_sicks')->nullable();
            $table->boolean('hip_art');
            $table->string('hip_art_since')->nullable();
            $table->string('hip_art_medicaments')->nullable();
            $table->string('hip_art_status')->nullable();
            $table->boolean('dia_mell');
            $table->string('dia_mell_since')->nullable();
            $table->string('dia_mell_medicaments')->nullable();
            $table->string('dia_mell_status')->nullable();
            $table->boolean('epilepsia');
            $table->string('epi_since')->nullable();
            $table->string('epi_medicaments')->nullable();
            $table->string('epi_status')->nullable();
            $table->boolean('sida');
            $table->string('sida_since')->nullable();
            $table->string('sida_medicaments')->nullable();
            $table->string('sida_status')->nullable();
            $table->boolean('hep_c');
            $table->string('hep_c_since')->nullable();
            $table->string('hep_c_medicaments')->nullable();
            $table->string('hep_c_status')->nullable();
            $table->boolean('asma');
            $table->string('asma_since')->nullable();
            $table->string('asma_medicaments')->nullable();
            $table->string('asma_status')->nullable();
            $table->boolean('artitris');
            $table->string('artritis_since')->nullable();
            $table->string('artritis_medicaments')->nullable();
            $table->string('artritis_status')->nullable();
            $table->boolean('tiroidismo');
            $table->string('tiroidismos_since')->nullable();
            $table->string('tiroidismos_medicaments')->nullable();
            $table->string('tiroidismos_status')->nullable();
            $table->boolean('cancer');
            $table->string('cancer_since')->nullable();
            $table->string('cancer_medicaments')->nullable();
            $table->string('cancer_status')->nullable();
            $table->boolean('other_actual_sicks');
            $table->string('wath_other_actual_sicks')->nullable();
            $table->string('wath_other_actual_sicks_medicaments')->nullable();
            $table->string('wath_other_actual_sicks_status')->nullable();
            $table->string('alergies')->nullable();
            $table->boolean('blood_coagulation');
            $table->boolean('kidney_problems');
            $table->string('what_kidney_problems')->nullable();
            $table->boolean('liver_problems');
            $table->string('what_liver_problems')->nullable();
            $table->boolean('ets');
            $table->string('wath_ets')->nullable();
            $table->boolean('surgeries');
            $table->string('surgeries_reason')->nullable();
            $table->string('blood_transfution')->nullable();
            $table->string('blood_transfution_reason')->nullable();
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
