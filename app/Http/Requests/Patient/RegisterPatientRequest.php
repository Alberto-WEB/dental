<?php

namespace App\Http\Requests\Patient;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //validation for patient
            'name' => 'required|string|max:100',
            'age' => 'required',
            'sex' => 'required',
            'address' => 'required|string|max:300',
            'civil_status' => 'required',
            'religion' => 'required',
            'occupation' => 'required',
            'phone' => 'required|numeric|digits:10',
            'email_patient' => 'required|string|email|max:100|unique:patients',

            //validation for InheritFamily
            'f_alive' => 'required',
            //'f_sicks' => 'required|string|max:45',
            'm_alive' => 'required',
            //'m_sicks' => 'required|string|max:45',
            'pa_gf_alive' => 'required',
            //'pa_gf_sicks' => 'required|string|max:45',
            'ma_gm_alive' => 'required',
            //'ma_gm_sicks' => 'required|string|max:45',
            //'others_alive' => 'required|string|max:45',
            //'others_sicks' => 'required|string|max:45',
            'pa_gm_alive' => 'required',
            //'pa_gm_sicks' => 'required|string|max:45',
            'ma_gf_alive' => 'required',
            //'ma_gf_sicks' => 'required|string|max:45',

            //validation for DentalClinic
            //'reason_medical_visit' => 'required|string|max:45',
            'medications' => 'required',
            //'wath_medication' => 'required|string|max:45',
            'dental_trauma' => 'required',
            //'wath_dental_trauma' => 'required|string|max:45',
            'speaking_difficulty' => 'required',
            'chewing_difficulty' => 'required',
            'openning_the_mounth_difficulty' => 'required',
            'have_pain' => 'required',
            //'where_is_pain' => 'required|string|max:45',
            //'caused_by' => 'required|string|max:45',
            //'pain_type' => 'required|string|max:45',
            //'calms_with' => 'required|string|max:45',
            'gums_bleed' => 'required',
            'abnormal_lips' => 'required',
            //'abnormal_lips_linjury' => 'required|string|max:45',
            'abnormal_cheeks' => 'required',
            //'abnormal_cheeks_injury' => 'required|string|max:45',
            'abnormal_gums' => 'required',
            //'abnormal_gums_ingury' => 'required|string|max:45',
            'abnormal_palate' => 'required',
            //'abnormal_palate_injury' => 'required|string|max:45',
            'abnormal_tongue' => 'required',
            //'abnormal_tongue_injury' => 'required|string|max:45',
            'abnormal_under_tongue' => 'required',
            //'abnormal_under_tongue_injury' => 'required|string|max:45',
            //'anywhere_else_abnormal' => 'required|string|max:45',
            //'how_is_injury' => 'required|string|max:45',
            'injury_has_pus' => 'required',
            //'when_has_pus' => 'required|string|max:45',
            'has_ulcers' => 'required',
            //'when_has_ulcers' => 'required|string|max:45',

            //validation for NoPersonalPathological
            'drugs' => 'required',
            //'drugs_take' => 'required',
            'smoke' => 'required',
            //'smoke_frequency' => 'required',
            'alcohol' => 'required',
            //'alcohol_frequency' => 'required',
            'pregnant' => 'required',
            //'pregnant_weeks' => 'required',
            //'pregnancy_number' => 'required',
            //'d_p_p' => 'required',

            //validation for PersonalPathological
            'sarampion' => 'required',
            'rubeola' => 'required',
            'varicela' => 'required',
            'parotiditis' => 'required',
            'tosferina' => 'required',
            'escarlatina' => 'required',
            //'other_childern_sicks' => 'required|string|max:45',
            'hip_art' => 'required',
            //'hip_art_since' => 'required|string|max:45',
            //'hip_art_medicaments' => 'required|string|max:45',
            //'hip_art_status' => 'required|string|max:45',
            'dia_mell' => 'required',
            //'dia_mell_since' => 'required|string|max:45',
            //'dia_mell_medicaments' => 'required|string|max:45',
            //'dia_mell_status' => 'required|string|max:45',
            'epilepsia' => 'required',
            //'epi_since' => 'required|string|max:45',
            //'epi_medicaments' => 'required|string|max:45',
            //'epi_status' => 'required|string|max:45',
            'sida' => 'required',
            //'sida_since' => 'required|string|max:45',
            //'sida_medicaments' => 'required|string|max:45',
            //'sida_status' => 'required|string|max:45',
            'hep_c' => 'required',
            //'hep_c_since' => 'required|string|max:45',
            //'hep_c_medicaments' => 'required|string|max:45',
            //'hep_c_status' => 'required|string|max:45',
            'asma' => 'required',
            //'asma_since' => 'required|string|max:45',
            //'asma_medicaments' => 'required|string|max:45',
            //'asma_status' => 'required|string|max:45',
            'artitris' => 'required',
            //'artritis_since' => 'required|string|max:45',
            //'artritis_medicaments' => 'required|string|max:45',
            //'artritis_status' => 'required|string|max:45',
            'tiroidismo' => 'required',
            //'tiroidismos_since' => 'required|string|max:45',
            //'tiroidismos_medicaments' => 'required|string|max:45',
            //'tiroidismos_status' => 'required|string|max:45',
            'cancer' => 'required',
            //'cancer_since' => 'required|string|max:45',
            //'cancer_medicaments' => 'required|string|max:45',
            //'cancer_status' => 'required|string|max:45',
            'other_actual_sicks' => 'required',
            //'wath_other_actual_sicks' => 'required|string|max:45',
            //'wath_other_actual_sicks_medicaments' => 'required|string|max:45',
            //'wath_other_actual_sicks_status' => 'required|string|max:45',
            //'alergies' => 'required|string|max:45',
            'kidney_problems' => 'required',
            //'what_kidney_problems' => 'required|string|max:45',
            'liver_problems' => 'required',
            //'what_liver_problems' => 'required|string|max:45',
            'ets' => 'required',
            //'wath_ets' => 'required|string|max:45',
            'surgeries' => 'required',
            //'surgeries_reason' => 'required|string|max:45',
            //'blood_transfution' => 'required|string|max:45',
            //'blood_transfution_reason' => 'required|string|max:45',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Debes ingresar tu nombre',
            'age.required' => 'Debes ingresar tu edad',
            'sex.required' => 'Debes ingresar tu sexo',
            'address.required' => 'Debes ingresar tu direccion',
            'address.max' => 'Solo puedes tener maximo 300 caracteres',
            'civil_status.required' => 'Debes ingresar tu estatus civil',
            'occupation.required' => 'Debes ingresar tu ocupacion del paciente',
            'phone.required' => 'Solo puedes tener maximo 300 caracteres',
            'phone.numeric' => 'Solo puedes ingresar numeros',
            'phone.digits' => 'Recuerda que el telefono debe ser a 10 digitos',
            'email_patient.required' => 'Debes ingresar el email',
            'email_patient.email' => 'Debdes ingresar formato email',
            'email_patient.max' => 'Recuerda que el email tiene maximo 100 caracteres',
            'email_patient.unique' => 'El email ingresado, ya se encuentra en uso',
        ];
    }
}
