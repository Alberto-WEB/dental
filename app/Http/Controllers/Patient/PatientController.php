<?php

namespace App\Http\Controllers\Patient;

use App\Models\Patient;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Models\DentalHistory;
use App\Models\InheritFamily;
use App\Exports\PatientsExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\PersonalPathological;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\NoPersonalPathological;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Patient\RegisterPatientRequest;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified', 'dentist']);
    }

    public function index()
    {
        //$patients = Patient::where('dentist_id', auth()->user()->id)->paginate();
        /*  $patients = Patient::orderBy('id', 'DESC')
            ->where('dentist_id', '=', Auth::user()->id)
            ->paginate(10); */

        return view('patients.index');
    }


    public function create()
    {
        return view('patients.create');
    }


    public function store(RegisterPatientRequest $request)
    {
        try {

            //insert to section patient
            $patient = new Patient();
            $patient->name = $request->name;
            $patient->age = $request->age;
            $patient->sex = $request->sex;
            $patient->address = $request->address;
            $patient->civil_status = $request->civil_status;
            $patient->religion = $request->religion;
            $patient->occupation = $request->occupation;
            $patient->phone = $request->phone;
            $patient->email_patient = $request->email_patient;
            $patient->dentist_id = Auth::user()->id;

            //dd($patient);
            $patient->save();

            $inheritFamily = new InheritFamily();
            $inheritFamily->f_alive = $request->f_alive;
            $inheritFamily->f_sicks = $request->f_sicks;
            $inheritFamily->m_alive = $request->m_alive;
            $inheritFamily->m_sicks = $request->m_sicks;
            $inheritFamily->pa_gf_alive = $request->pa_gf_alive;
            $inheritFamily->pa_gf_sicks = $request->pa_gf_sicks;
            $inheritFamily->ma_gm_alive = $request->ma_gm_alive;
            $inheritFamily->ma_gm_sicks = $request->ma_gm_sicks;
            $inheritFamily->others_alive = $request->others_alive;
            $inheritFamily->others_sicks = $request->others_sicks;

            $inheritFamily->pa_gm_alive = $request->pa_gm_alive; //bollean
            $inheritFamily->pa_gm_sicks = $request->pa_gm_sicks;
            $inheritFamily->ma_gf_alive = $request->ma_gf_alive; //bollean
            $inheritFamily->ma_gf_sicks = $request->ma_gf_sicks;

            $inheritFamily->patient_id = $patient->id;

            //dd($inheritFamily);
            $inheritFamily->save();

            //insert to section historial dental
            $DentalHistory = new DentalHistory();
            $DentalHistory->reason_medical_visit = $request->reason_medical_visit;
            $DentalHistory->medications = $request->medications;
            $DentalHistory->wath_medication = $request->wath_medication;
            $DentalHistory->dental_trauma = $request->dental_trauma;
            $DentalHistory->wath_dental_trauma = $request->wath_dental_trauma;
            $DentalHistory->speaking_difficulty = $request->speaking_difficulty;
            $DentalHistory->chewing_difficulty = $request->chewing_difficulty;
            $DentalHistory->openning_the_mounth_difficulty = $request->openning_the_mounth_difficulty;
            $DentalHistory->have_pain = $request->have_pain;
            $DentalHistory->where_is_pain = $request->where_is_pain;
            $DentalHistory->caused_by = $request->caused_by;
            $DentalHistory->pain_type = $request->pain_type;
            $DentalHistory->calms_with = $request->calms_with;
            $DentalHistory->gums_bleed = $request->gums_bleed;
            $DentalHistory->abnormal_lips = $request->abnormal_lips;
            $DentalHistory->abnormal_lips_linjury = $request->abnormal_lips_linjury;
            $DentalHistory->abnormal_cheeks = $request->abnormal_cheeks;
            $DentalHistory->abnormal_cheeks_injury = $request->abnormal_cheeks_injury;
            $DentalHistory->abnormal_gums = $request->abnormal_gums;
            $DentalHistory->abnormal_gums_ingury = $request->abnormal_gums_ingury;
            $DentalHistory->abnormal_palate = $request->abnormal_palate;
            $DentalHistory->abnormal_palate_injury = $request->abnormal_palate_injury;
            $DentalHistory->abnormal_tongue = $request->abnormal_tongue;
            $DentalHistory->abnormal_tongue_injury = $request->abnormal_tongue_injury;
            $DentalHistory->abnormal_under_tongue = $request->abnormal_under_tongue;
            $DentalHistory->abnormal_under_tongue_injury = $request->abnormal_under_tongue_injury;
            $DentalHistory->anywhere_else_abnormal = $request->anywhere_else_abnormal;
            $DentalHistory->how_is_injury = $request->how_is_injury;
            $DentalHistory->injury_has_pus = $request->injury_has_pus;
            $DentalHistory->when_has_pus = $request->when_has_pus;
            $DentalHistory->has_ulcers = $request->has_ulcers;
            $DentalHistory->when_has_ulcers = $request->when_has_ulcers;
            $DentalHistory->patient_id = $patient->id;
            $DentalHistory->save();

            //insert to section historial clinic NoPersonalPathological section 3
            $NoPersonalPathological = new NoPersonalPathological();
            $NoPersonalPathological->drugs = $request->drugs;
            $NoPersonalPathological->drugs_take = $request->drugs_take;
            $NoPersonalPathological->smoke = $request->smoke;
            $NoPersonalPathological->smoke_frequency = $request->smoke_frequency;
            $NoPersonalPathological->alcohol = $request->alcohol;
            $NoPersonalPathological->alcohol_frequency = $request->alcohol_frequency;
            $NoPersonalPathological->pregnant = $request->pregnant;
            $NoPersonalPathological->pregnant_weeks = $request->pregnant_weeks;
            $NoPersonalPathological->pregnancy_number = $request->pregnancy_number;
            $NoPersonalPathological->d_p_p = $request->d_p_p;
            $NoPersonalPathological->patient_id = $patient->id;
            $NoPersonalPathological->save();


            //insert to section historial clinic PersonalPathological section 4
            $PersonalPathological = new PersonalPathological();
            $PersonalPathological->sarampion = $request->sarampion;
            $PersonalPathological->rubeola = $request->rubeola;
            $PersonalPathological->varicela = $request->varicela;
            $PersonalPathological->parotiditis = $request->parotiditis;
            $PersonalPathological->tosferina = $request->tosferina;
            $PersonalPathological->escarlatina = $request->escarlatina;
            $PersonalPathological->other_childern_sicks = $request->other_childern_sicks;
            $PersonalPathological->hip_art = $request->hip_art;
            $PersonalPathological->hip_art_since = $request->hip_art_since;
            $PersonalPathological->hip_art_medicaments = $request->hip_art_medicaments;
            $PersonalPathological->hip_art_status = $request->hip_art_status;
            $PersonalPathological->dia_mell = $request->dia_mell;
            $PersonalPathological->dia_mell_since = $request->dia_mell_since;
            $PersonalPathological->dia_mell_medicaments = $request->dia_mell_medicaments;
            $PersonalPathological->dia_mell_status = $request->dia_mell_status;
            $PersonalPathological->epilepsia = $request->epilepsia;
            $PersonalPathological->epi_since = $request->epi_since;
            $PersonalPathological->epi_medicaments = $request->epi_medicaments;
            $PersonalPathological->epi_status = $request->epi_status;
            $PersonalPathological->sida = $request->sida; //20
            $PersonalPathological->sida_since = $request->sida_since;
            $PersonalPathological->sida_medicaments = $request->sida_medicaments;
            $PersonalPathological->sida_status = $request->sida_status;
            $PersonalPathological->hep_c = $request->hep_c;
            $PersonalPathological->hep_c_since = $request->hep_c_since;
            $PersonalPathological->hep_c_medicaments = $request->hep_c_medicaments;
            $PersonalPathological->hep_c_status = $request->hep_c_status;
            $PersonalPathological->asma = $request->asma;
            $PersonalPathological->asma_since = $request->asma_since;
            $PersonalPathological->asma_medicaments = $request->asma_medicaments;
            $PersonalPathological->asma_status = $request->asma_status;
            $PersonalPathological->artitris = $request->artitris;
            $PersonalPathological->artritis_since = $request->artritis_since;
            $PersonalPathological->artritis_medicaments = $request->artritis_medicaments;
            $PersonalPathological->artritis_status = $request->artritis_status;
            $PersonalPathological->tiroidismo = $request->tiroidismo;
            $PersonalPathological->tiroidismos_since = $request->tiroidismos_since;
            $PersonalPathological->tiroidismos_medicaments = $request->tiroidismos_medicaments;
            $PersonalPathological->tiroidismos_status = $request->tiroidismos_status;
            $PersonalPathological->cancer = $request->cancer; //40
            $PersonalPathological->cancer_since = $request->cancer_since;
            $PersonalPathological->cancer_medicaments = $request->cancer_medicaments;
            $PersonalPathological->cancer_status = $request->cancer_status;
            $PersonalPathological->other_actual_sicks = $request->other_actual_sicks;
            $PersonalPathological->wath_other_actual_sicks = $request->wath_other_actual_sicks;
            $PersonalPathological->wath_other_actual_sicks_medicaments = $request->wath_other_actual_sicks_medicaments;
            $PersonalPathological->wath_other_actual_sicks_status = $request->wath_other_actual_sicks_status;
            $PersonalPathological->alergies = $request->alergies;
            $PersonalPathological->blood_coagulation = $request->blood_coagulation;
            $PersonalPathological->kidney_problems = $request->kidney_problems; //50
            $PersonalPathological->what_kidney_problems = $request->what_kidney_problems;
            $PersonalPathological->liver_problems = $request->liver_problems;
            $PersonalPathological->what_liver_problems = $request->what_liver_problems;
            $PersonalPathological->ets = $request->ets;
            $PersonalPathological->wath_ets = $request->wath_ets;
            $PersonalPathological->surgeries = $request->surgeries;
            $PersonalPathological->surgeries_reason = $request->surgeries_reason;
            $PersonalPathological->blood_transfution = $request->blood_transfution;
            $PersonalPathological->blood_transfution_reason = $request->blood_transfution_reason;
            $PersonalPathological->patient_id = $patient->id;
            $PersonalPathological->save();

            $notification = 'El paciente se ha registrado correctamente';
            return redirect('/patients')->with(compact('notification'));
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
            return view('errors.500');
        }

        /* Alert::success('Felicidades', 'Paciente agregado con exito.');

        return redirect('/patients');
        */
    }


    public function show($id)
    {

        $patient = Patient::find($id);
        $this->authorize('author', $patient);

        $inheritFamily = DB::table('patients as p')
            ->join('inherit_families as if', 'p.id', '=', 'if.patient_id')
            ->where('if.patient_id', $patient->id)
            ->get('if.*');

        $DentalHistory = DB::table('patients as p')
            ->join('dental_histories as dh', 'p.id', '=', 'dh.patient_id')
            ->where('dh.patient_id', $patient->id)
            ->get('dh.*');

        $NoPersonalPathological = DB::table('patients as p')
            ->join('no_personal_pathologicals as npp', 'p.id', '=', 'npp.patient_id')
            ->where('npp.patient_id', $patient->id)
            ->get('npp.*');

        $PersonalPathological = DB::table('patients as p')
            ->join('personal_pathologicals as pp', 'p.id', '=', 'pp.patient_id')
            ->where('pp.patient_id', $patient->id)
            ->get('pp.*');

        //dd($patient);

        //dd($inheritFamily);


        return view('patients.show', compact('patient', 'inheritFamily', 'DentalHistory', 'NoPersonalPathological', 'PersonalPathological'));
    }


    public function edit($id)
    {
        //Gate::authorize('author', 'id');
        $patient = Patient::findOrFail($id);
        $this->authorize('author', $patient);

        $inheritFamily = DB::table('patients as p')
            ->join('inherit_families as if', 'p.id', '=', 'if.patient_id')
            ->where('if.patient_id', $patient->id)
            ->get('if.*');

        $DentalHistory = DB::table('patients as p')
            ->join('dental_histories as dh', 'p.id', '=', 'dh.patient_id')
            ->where('dh.patient_id', $patient->id)
            ->get('dh.*');

        $NoPersonalPathological = DB::table('patients as p')
            ->join('no_personal_pathologicals as npp', 'p.id', '=', 'npp.patient_id')
            ->where('npp.patient_id', $patient->id)
            ->get('npp.*');

        $PersonalPathological = DB::table('patients as p')
            ->join('personal_pathologicals as pp', 'p.id', '=', 'pp.patient_id')
            ->where('pp.patient_id', $patient->id)
            ->get('pp.*');

        //dd($patient);

        //dd($inheritFamily);


        return view('patients.edit', compact('patient', 'inheritFamily', 'DentalHistory', 'NoPersonalPathological', 'PersonalPathological'));
    }


    public function update(Request $request, $id, $idinheritFamily, $idDentalHistory, $idNoPersonalPathological, $idPersonalPathological)
    {
        try {

            $patient = Patient::findOrFail($id);
            $this->authorize('author', $patient);

            //update to section patient
            $patient->name = $request->name;
            $patient->age = $request->age;
            $patient->sex = $request->sex;
            $patient->address = $request->address;
            $patient->civil_status = $request->civil_status;
            $patient->religion = $request->religion;
            $patient->occupation = $request->occupation;
            $patient->phone = $request->phone;
            $patient->email_patient = $request->email_patient;

            //dd($patient);
            $patient->update();

            $inheritFamily = InheritFamily::find($idinheritFamily);
            //dd($inheritFamily);

            //update to section historial
            $inheritFamily->f_alive = $request->f_alive;
            $inheritFamily->f_sicks = $request->f_sicks;
            $inheritFamily->m_alive = $request->m_alive;
            $inheritFamily->m_sicks = $request->m_sicks;
            $inheritFamily->pa_gf_alive = $request->pa_gf_alive;
            $inheritFamily->pa_gf_sicks = $request->pa_gf_sicks;
            $inheritFamily->ma_gm_alive = $request->ma_gm_alive;
            $inheritFamily->ma_gm_sicks = $request->ma_gm_sicks;
            $inheritFamily->others_alive = $request->others_alive;
            $inheritFamily->others_sicks = $request->others_sicks;

            $inheritFamily->pa_gm_alive = $request->pa_gm_alive; //bollean
            $inheritFamily->pa_gm_sicks = $request->pa_gm_sicks;
            $inheritFamily->ma_gf_alive = $request->ma_gf_alive; //bollean
            $inheritFamily->ma_gf_sicks = $request->ma_gf_sicks;
            //dd($inheritFamily);

            $inheritFamily->update();

            $DentalHistory = DentalHistory::find($idDentalHistory);
            //update to section historial dental
            $DentalHistory->reason_medical_visit = $request->reason_medical_visit;
            $DentalHistory->medications = $request->medications;
            $DentalHistory->wath_medication = $request->wath_medication;
            $DentalHistory->dental_trauma = $request->dental_trauma;
            $DentalHistory->wath_dental_trauma = $request->wath_dental_trauma;
            $DentalHistory->speaking_difficulty = $request->speaking_difficulty;
            $DentalHistory->chewing_difficulty = $request->chewing_difficulty;
            $DentalHistory->openning_the_mounth_difficulty = $request->openning_the_mounth_difficulty;
            $DentalHistory->have_pain = $request->have_pain;
            $DentalHistory->where_is_pain = $request->where_is_pain;
            $DentalHistory->caused_by = $request->caused_by;
            $DentalHistory->pain_type = $request->pain_type;
            $DentalHistory->calms_with = $request->calms_with;
            $DentalHistory->gums_bleed = $request->gums_bleed;
            $DentalHistory->abnormal_lips = $request->abnormal_lips;
            $DentalHistory->abnormal_lips_linjury = $request->abnormal_lips_linjury;
            $DentalHistory->abnormal_cheeks = $request->abnormal_cheeks;
            $DentalHistory->abnormal_cheeks_injury = $request->abnormal_cheeks_injury;
            $DentalHistory->abnormal_gums = $request->abnormal_gums;
            $DentalHistory->abnormal_gums_ingury = $request->abnormal_gums_ingury;
            $DentalHistory->abnormal_palate = $request->abnormal_palate;
            $DentalHistory->abnormal_palate_injury = $request->abnormal_palate_injury;
            $DentalHistory->abnormal_tongue = $request->abnormal_tongue;
            $DentalHistory->abnormal_tongue_injury = $request->abnormal_tongue_injury;
            $DentalHistory->abnormal_under_tongue = $request->abnormal_under_tongue;
            $DentalHistory->abnormal_under_tongue_injury = $request->abnormal_under_tongue_injury;
            $DentalHistory->anywhere_else_abnormal = $request->anywhere_else_abnormal;
            $DentalHistory->how_is_injury = $request->how_is_injury;
            $DentalHistory->injury_has_pus = $request->injury_has_pus;
            $DentalHistory->when_has_pus = $request->when_has_pus;
            $DentalHistory->has_ulcers = $request->has_ulcers;
            $DentalHistory->when_has_ulcers = $request->when_has_ulcers;

            $DentalHistory->update();

            $NoPersonalPathological = NoPersonalPathological::find($idNoPersonalPathological);
            //update to section historial clinic NoPersonalPathological
            $NoPersonalPathological->drugs = $request->drugs;
            $NoPersonalPathological->drugs_take = $request->drugs_take;
            $NoPersonalPathological->smoke = $request->smoke;
            $NoPersonalPathological->smoke_frequency = $request->smoke_frequency;
            $NoPersonalPathological->alcohol = $request->alcohol;
            $NoPersonalPathological->alcohol_frequency = $request->alcohol_frequency;
            $NoPersonalPathological->pregnant = $request->pregnant;
            $NoPersonalPathological->pregnant_weeks = $request->pregnant_weeks;
            $NoPersonalPathological->pregnancy_number = $request->pregnancy_number;
            $NoPersonalPathological->d_p_p = $request->d_p_p;

            $NoPersonalPathological->update();

            //update to section historial clinic PersonalPathological
            $PersonalPathological = PersonalPathological::find($idPersonalPathological);
            $PersonalPathological->sarampion = $request->sarampion;
            $PersonalPathological->rubeola = $request->rubeola;
            $PersonalPathological->varicela = $request->varicela;
            $PersonalPathological->parotiditis = $request->parotiditis;
            $PersonalPathological->tosferina = $request->tosferina;
            $PersonalPathological->escarlatina = $request->escarlatina;
            $PersonalPathological->other_childern_sicks = $request->other_childern_sicks;
            $PersonalPathological->hip_art = $request->hip_art;
            $PersonalPathological->hip_art_since = $request->hip_art_since;
            $PersonalPathological->hip_art_medicaments = $request->hip_art_medicaments;
            $PersonalPathological->hip_art_status = $request->hip_art_status;
            $PersonalPathological->dia_mell = $request->dia_mell;
            $PersonalPathological->dia_mell_since = $request->dia_mell_since;
            $PersonalPathological->dia_mell_medicaments = $request->dia_mell_medicaments;
            $PersonalPathological->dia_mell_status = $request->dia_mell_status;
            $PersonalPathological->epilepsia = $request->epilepsia;
            $PersonalPathological->epi_since = $request->epi_since;
            $PersonalPathological->epi_medicaments = $request->epi_medicaments;
            $PersonalPathological->epi_status = $request->epi_status;
            $PersonalPathological->sida = $request->sida; //20
            $PersonalPathological->sida_since = $request->sida_since;
            $PersonalPathological->sida_medicaments = $request->sida_medicaments;
            $PersonalPathological->sida_status = $request->sida_status;
            $PersonalPathological->hep_c = $request->hep_c;
            $PersonalPathological->hep_c_since = $request->hep_c_since;
            $PersonalPathological->hep_c_medicaments = $request->hep_c_medicaments;
            $PersonalPathological->hep_c_status = $request->hep_c_status;
            $PersonalPathological->asma = $request->asma;
            $PersonalPathological->asma_since = $request->asma_since;
            $PersonalPathological->asma_medicaments = $request->asma_medicaments;
            $PersonalPathological->asma_status = $request->asma_status;
            $PersonalPathological->artitris = $request->artitris;
            $PersonalPathological->artritis_since = $request->artritis_since;
            $PersonalPathological->artritis_medicaments = $request->artritis_medicaments;
            $PersonalPathological->artritis_status = $request->artritis_status;
            $PersonalPathological->tiroidismo = $request->tiroidismo;
            $PersonalPathological->tiroidismos_since = $request->tiroidismos_since;
            $PersonalPathological->tiroidismos_medicaments = $request->tiroidismos_medicaments;
            $PersonalPathological->tiroidismos_status = $request->tiroidismos_status;
            $PersonalPathological->cancer = $request->cancer; //40
            $PersonalPathological->cancer_since = $request->cancer_since;
            $PersonalPathological->cancer_medicaments = $request->cancer_medicaments;
            $PersonalPathological->cancer_status = $request->cancer_status;
            $PersonalPathological->other_actual_sicks = $request->other_actual_sicks;
            $PersonalPathological->wath_other_actual_sicks = $request->wath_other_actual_sicks;
            $PersonalPathological->wath_other_actual_sicks_medicaments = $request->wath_other_actual_sicks_medicaments;
            $PersonalPathological->wath_other_actual_sicks_status = $request->wath_other_actual_sicks_status;
            $PersonalPathological->alergies = $request->alergies;
            $PersonalPathological->blood_coagulation = $request->blood_coagulation;
            $PersonalPathological->kidney_problems = $request->kidney_problems; //50
            $PersonalPathological->what_kidney_problems = $request->what_kidney_problems;
            $PersonalPathological->liver_problems = $request->liver_problems;
            $PersonalPathological->what_liver_problems = $request->what_liver_problems;
            $PersonalPathological->ets = $request->ets;
            $PersonalPathological->wath_ets = $request->wath_ets;
            $PersonalPathological->surgeries = $request->surgeries;
            $PersonalPathological->surgeries_reason = $request->surgeries_reason;
            $PersonalPathological->blood_transfution = $request->blood_transfution;
            $PersonalPathological->blood_transfution_reason = $request->blood_transfution_reason;

            $PersonalPathological->update();

            $notification = 'El historial clinico del paciente se ha actualizado correctamente';
            return redirect('/patients')->with(compact('notification'));
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
            return view('errors.500');
        }
    }


    public function destroy(Patient $patient)
    {
        try {

            //Patient::find($id)->delete();

            //$patient = Patient::find($id);
            //dd($patient);

            $patient->delete();

            $notification = 'El paciente se elimino correctamente';
            return redirect('/patients')->with(compact('notification'));

            //return response()->json(null, 204);
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
            return view('errors.500');
        }
    }

    public function filter_search(Request $request)
    {

        $patients = Patient::search($request->searchText)
            /* ->where('dentist_id', '=', Auth::user()->id) */
            ->paginate(10);

        //dd($patients);
        return view('patients.index', compact('patients'));
    }

    public function exportAllPatientsExcel()
    {
        return (new PatientsExport)->download('patients.csv', Excel::CSV);
    }

    public function exportAllPatientsPdf()
    {
        return (new PatientsExport)->download('patients.pdf', Excel::DOMPDF);
    }
}
