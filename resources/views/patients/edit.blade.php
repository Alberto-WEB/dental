@extends('layouts.app', ['class' => 'bg-default'])

@section('title', 'Editar Paciente')

@section('content')
    <div class="header bg-gradient-primary py-5 py-lg-7 py-sm-7">
       <div class="container-fluid">
            <div class="card shadow">
        <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Editar Paciente</h3>
            </div>
            <div class="col text-right">
            <a href="{{ url('/patients') }}" class="btn btn-sm btn-success">Regresar</a>
            </div>
        </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Por favor!</strong> {{ $error }}
                    </div>
                @endforeach
            @endif


             {{-- patient --}}

            <form action="{{ url('/patients/'.$patient->id.$inheritFamily[0]->id.$DentalHistory[0]->id.$NoPersonalPathological[0]->id.$PersonalPathological[0]->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-sm-5">
                        <label for="name">Nombre del paciente</label>
                        <input type="text" name="name" class="form-control" value="{{ $patient->name }}" required>
                    </div>
                    <div class="col-sm-1">
                        <label for="age">Edad</label>
                        <input type="number" name="age" class="form-control" value="{{ $patient->age }}" required>
                    </div>

                    <div class="col-sm-1">
                        <label for="sex">Sexo</label>
                        <select name="sex" class="form-control" value="{{ old('sex') }}" required>
                            <option value={{ $patient->sex }}>{{ $patient->sex }}</option>
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Otro">Otro</option>
                        </select>
                    </div>
                    
                    <div class="col-sm-5">
                        <label for="email_patient">Email</label>
                        <input type="email" name="email_patient" class="form-control" value="{{ $patient->email_patient }}" required>
                    </div>
                </div>
                
                
                <div class="form-group mt-3">
                    <label for="address">Direccion</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address', $patient->address) }}" required>
                </div>

                <div class="form-row">
                     <div class="col-sm-3">
                        <label for="civil_status">Estatus Civil</label>
                        <select name="civil_status" class="form-control" name="civil_status" required>
                             <option value={{ $patient->civil_status }}>{{ $patient->civil_status }}</option>
                            <option value="Soltero">Soltero</option>
                            <option value="Casado">Casado</option>
                            <option value="Viudo">Viudo</option>
                            <option value="Separado">Separado</option>
                            <option value="Divorciado">Divorciado</option>
                            <option value="Otro">Otro</option>
                        </select>    
                    </div>

                     <div class="col-sm-3">
                        <label for="religion">Religion</label>
                        <select name="religion" class="form-control" name="religion" required>
                              <option value={{ $patient->religion }}>{{ $patient->religion }}</option>
                            <option value="Catolisismo">Catolisismo</option>
                            <option value="Cristianismo">Cristianismo</option>
                            <option value="Hinduismo">Hinduismo</option>
                            <option value="Islam">Islam</option>
                            <option value="Budismo">Budismo</option>
                            <option value="Otra">Otra</option>
                        </select>    
                    </div>

                     <div class="col-sm-3">
                        <label for="phone">Ocupacion</label>
                        <input type="text" name="occupation" class="form-control" value="{{ $patient->occupation }}">
                    </div>
                    
                     <div class="col-sm-3">
                        <label for="phone">Telefono</label>
                        <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}" required>
                    </div>
                </div>

                <hr>

                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h3 class="mb-0">Antecedentes Heredo Familiares</h3>
                    </div>
                </div>

                {{-- inherit_families --}}

                <div class="form-row">
                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">padre</h4>
                        
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="f_alive1" name="f_alive" value="1" {{ ($inheritFamily[0]->f_alive == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="f_alive1">Vivo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="f_alive2" name="f_alive" value="0" {{ ($inheritFamily[0]->f_alive == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="f_alive2">Fallecio</label>
                            </div>

                             <div class="form-group">
                                <label for="f_sicks">Emfermedades hereditarias del padre</label>
                                <textarea class="form-control" name="f_sicks" value="{{ $inheritFamily[0]->f_sicks }}" rows="3">{{ $inheritFamily[0]->f_sicks }}</textarea>
                            </div>                   
 
                    </div> 

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Madre</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="m_alive1" name="m_alive" value="1" {{ ($inheritFamily[0]->m_alive == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="m_alive1">Vivo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="m_alive2" name="m_alive" value="0" {{ ($inheritFamily[0]->m_alive == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="m_alive2">Fallecio</label>
                            </div>

                             <div class="form-group">
                                    <label for="m_sicks">Emfermedades hereditarias de la madre</label>
                                    <textarea class="form-control" name="m_sicks" rows="3" value="{{ $inheritFamily[0]->m_sicks }}">{{ $inheritFamily[0]->m_sicks }}</textarea>
                            </div>

                    </div> 

                     {{-- abuelo paterno --}}

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Abuelo (paterno)</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pa_gf_alive1" name="pa_gf_alive" value="1" {{ ($inheritFamily[0]->pa_gf_alive == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="pa_gf_alive1">Vivo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pa_gf_alive2" name="pa_gf_alive" value="0" {{ ($inheritFamily[0]->pa_gf_alive == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="pa_gf_alive2">Fallecio</label>
                            </div>

                             <div class="form-group">
                                <label for="pa_gf_sicks">Emfermedades hereditarias de su abuelo</label>
                                <textarea class="form-control" name="pa_gf_sicks" rows="3" value="{{ $inheritFamily[0]->pa_gf_sicks }}">{{ $inheritFamily[0]->pa_gf_sicks }}</textarea>
                            </div>

                    </div> 

                     {{-- abuela paterna --}}

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Abuela (paterna)</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pa_gm_alive1" name="pa_gm_alive" value="1" {{ ($inheritFamily[0]->pa_gm_alive == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="pa_gm_alive1">Vivo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pa_gm_alive2" name="pa_gm_alive" value="0" {{ ($inheritFamily[0]->pa_gm_alive == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="pa_gm_alive2">Fallecio</label>
                            </div>

                            <div class="form-group">
                                <label for="pa_gm_sicks">Emfermedades hereditarias de su abuela</label>
                                <textarea class="form-control" name="pa_gm_sicks" rows="3" value="{{ $inheritFamily[0]->pa_gm_sicks }}">{{ $inheritFamily[0]->pa_gm_sicks }}</textarea>
                            </div>
 
                    </div> 

                </div>


                <div class="form-row">
                    <div class="col-sm-3">
                        <label for="others_alive">Otros Familiares</label>
                        <textarea class="form-control" name="others_alive" rows="5" value="{{ $inheritFamily[0]->others_alive }}">{{ $inheritFamily[0]->others_alive }}</textarea>
                    </div>

                    <div class="col-sm-3">
                        <label for="others_sicks">Emfermedades de familiares adicionaes</label>
                        <textarea class="form-control" name="others_sicks" rows="5" value="{{ $inheritFamily[0]->others_sicks }}">{{ $inheritFamily[0]->others_sicks }}</textarea>
                    </div>

                     {{-- abuelo materna --}}

                     <div class="col-sm-3">
                        <h4 class="custom-control-inline">Abuelo (materno)</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="ma_gf_alive1" name="ma_gf_alive" value="1" {{ ($inheritFamily[0]->ma_gf_alive == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="ma_gf_alive1">Vivo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="ma_gf_alive2" name="ma_gf_alive" value="0" {{ ($inheritFamily[0]->ma_gf_alive == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="ma_gf_alive2">Fallecio</label>
                            </div>

                             <div class="form-group">
                                <label for="ma_gf_sicks">Emfermedades hereditarias abuelo materno</label>
                                <textarea class="form-control" name="ma_gf_sicks" rows="3" value="{{ $inheritFamily[0]->ma_gf_sicks }}">{{ $inheritFamily[0]->ma_gf_sicks }}</textarea>
                            </div>  
                    </div> 

                     {{-- abuela materna --}}

                     <div class="col-sm-3">
                        <h4 class="custom-control-inline">Abuela (materna)</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="ma_gm_alive1" name="ma_gm_alive" value="1" {{ ($inheritFamily[0]->ma_gm_alive == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="ma_gm_alive1">Vivo</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="ma_gm_alive2" name="ma_gm_alive" value="0" {{ ($inheritFamily[0]->ma_gm_alive == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="ma_gm_alive2">Fallecio</label>
                            </div>

                             <div class="form-group">
                                <label for="ma_gm_sicks">Emfermedades hereditarias abuela materno</label>
                                <textarea class="form-control" name="ma_gm_sicks" rows="3" value="{{ $inheritFamily[0]->ma_gm_sicks }}">{{ $inheritFamily[0]->ma_gm_sicks }}</textarea>
                            </div>  
                    </div> 

                </div>

               
                <hr>

                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h3 class="mb-0">Historial Dental</h3>
                    </div>
                </div>

                    {{-- Historial Dental --}}
                <div class="form-row">
                     <div class="col-sm-3">
                        <label for="reason_medical_visit">Motivo de Visita Medica</label>
                        <textarea class="form-control" name="reason_medical_visit" rows="5" value="{{ $DentalHistory[0]->reason_medical_visit }}">{{ $DentalHistory[0]->reason_medical_visit }}</textarea>
                    </div>
                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Medicacion</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="medications1" name="medications" value="1"  {{ ($DentalHistory[0]->medications == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="medications1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="medications2" name="medications" value="0" {{ ($DentalHistory[0]->medications == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="medications2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="wath_medication">Ingrese los medicamentos</label>
                                <textarea class="form-control" name="wath_medication" rows="3" value="{{ $DentalHistory[0]->wath_medication }}">{{ $DentalHistory[0]->wath_medication }}</textarea>
                            </div>  
                    </div> 

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Trauma dental</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dental_trauma1" name="dental_trauma" value="1" {{ ($DentalHistory[0]->dental_trauma == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="dental_trauma1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dental_trauma2" name="dental_trauma" value="0" {{ ($DentalHistory[0]->dental_trauma == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="dental_trauma2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="wath_dental_trauma">Describa el trauma dental</label>
                                <textarea class="form-control" name="wath_dental_trauma" rows="3" value="{{ $DentalHistory[0]->wath_dental_trauma }}">{{ $DentalHistory[0]->wath_dental_trauma }}</textarea>
                            </div>  
                    </div> 

                    <div class="col-sm-3">
                        
                        <h4 class="custom-control-inline">Dificultad al hablar</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="speaking_difficulty1" name="speaking_difficulty" value="1" {{ ($DentalHistory[0]->speaking_difficulty == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="speaking_difficulty1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="speaking_difficulty2" name="speaking_difficulty" value="0" {{ ($DentalHistory[0]->speaking_difficulty == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="speaking_difficulty2">No</label>
                            </div>

                        <h4 class="custom-control-inline">Dificultad al masticar</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="chewing_difficulty1" name="chewing_difficulty" value="1" {{ ($DentalHistory[0]->chewing_difficulty == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="chewing_difficulty1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="chewing_difficulty2" name="chewing_difficulty" value="0" {{ ($DentalHistory[0]->chewing_difficulty == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="chewing_difficulty2">No</label>
                            </div>

                         <h4 class="custom-control-inline">Dificultad al abrir la boca</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="openning_the_mounth_difficulty1" name="openning_the_mounth_difficulty" value="1" {{ ($DentalHistory[0]->openning_the_mounth_difficulty == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="openning_the_mounth_difficulty1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="openning_the_mounth_difficulty2" name="openning_the_mounth_difficulty" value="0" {{ ($DentalHistory[0]->openning_the_mounth_difficulty == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="openning_the_mounth_difficulty2">No</label>
                            </div>

                         <h4 class="custom-control-inline">Tiene dolor</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="have_pain1" name="have_pain" value="1"  {{ ($DentalHistory[0]->have_pain == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="have_pain1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="have_pain2" name="have_pain" value="0"  {{ ($DentalHistory[0]->have_pain == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="have_pain2">No</label>
                            </div>

                           
                         <h4 class="custom-control-inline">Las ensias sangran?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gums_bleed1" name="gums_bleed" value="1" {{ ($DentalHistory[0]->gums_bleed == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="gums_bleed1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="gums_bleed2" name="gums_bleed" value="0" {{ ($DentalHistory[0]->gums_bleed == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="gums_bleed2">No</label>
                            </div>

                    </div> 

                </div>

                <div class="form-row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="where_is_pain">En que parte es el dolor?</label>
                            <textarea class="form-control" name="where_is_pain" rows="3" value="{{ $DentalHistory[0]->where_is_pain }}">{{ $DentalHistory[0]->where_is_pain }}</textarea>
                        </div> 
                    </div>
                     <div class="col-sm-3">
                        <div class="form-group">
                            <label for="caused_by">Causado por?</label>
                            <textarea class="form-control" name="caused_by" rows="3" value="{{ $DentalHistory[0]->caused_by }}">{{ $DentalHistory[0]->caused_by }}</textarea>
                        </div> 
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="pain_type">Tipo de dolor?</label>
                            <textarea class="form-control" name="pain_type" rows="3" value="{{ $DentalHistory[0]->pain_type }}">{{ $DentalHistory[0]->pain_type }}</textarea>
                        </div> 
                    </div> 
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="calms_with">Se controla con?</label>
                            <textarea class="form-control" name="calms_with" rows="3" value="{{ $DentalHistory[0]->calms_with }}">{{ $DentalHistory[0]->calms_with }}</textarea>
                        </div> 
                    </div>  

                     
                </div>

                <div class="form-row">
                    
                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Labios anormales?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_lips1" name="abnormal_lips" value="1" {{ ($DentalHistory[0]->abnormal_lips == '1')? "checked" : "" }}  class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_lips1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_lips2" name="abnormal_lips" value="0" {{ ($DentalHistory[0]->abnormal_lips == '0')? "checked" : "" }}  class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_lips2">No</label>
                            </div>

                             <div class="form-group mt-3">
                                <label for="abnormal_lips_linjury">Ingrese lesiones de labios</label>
                                <textarea class="form-control" name="abnormal_lips_linjury" rows="3" value="{{ $DentalHistory[0]->abnormal_lips_linjury }}">{{ $DentalHistory[0]->abnormal_lips_linjury }}</textarea>
                            </div>  
                    </div> 

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Mejillas anormales?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_cheeks1" name="abnormal_cheeks" value="1" {{ ($DentalHistory[0]->abnormal_cheeks == '1')? "checked" : "" }}  class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_cheeks1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_cheeks2" name="abnormal_cheeks" value="0" {{ ($DentalHistory[0]->abnormal_cheeks == '0')? "checked" : "" }}  class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_cheeks2">No</label>
                            </div>

                             <div class="form-group mt-3">
                                <label for="abnormal_cheeks_injury">Ingrese lesiones de mejillas</label>
                                <textarea class="form-control" name="abnormal_cheeks_injury" rows="3" value="{{ $DentalHistory[0]->abnormal_cheeks_injury }}">{{ $DentalHistory[0]->abnormal_cheeks_injury }}</textarea>
                            </div>  
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Encias anormales?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_gums1" name="abnormal_gums" value="1" {{ ($DentalHistory[0]->abnormal_gums == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_gums1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_gums2" name="abnormal_gums" value="0" {{ ($DentalHistory[0]->abnormal_gums == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_gums2">No</label>
                            </div>

                             <div class="form-group mt-3">
                                <label for="abnormal_gums_ingury">Ingrese lesiones de encias</label>
                                <textarea class="form-control" name="abnormal_gums_ingury" rows="3" value="{{ $DentalHistory[0]->abnormal_gums_ingury }}">{{ $DentalHistory[0]->abnormal_gums_ingury }}</textarea>
                            </div>  
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Paladar anormal?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_palate1" name="abnormal_palate" value="1" {{ ($DentalHistory[0]->abnormal_palate == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_palate1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_palate2" name="abnormal_palate" value="0" {{ ($DentalHistory[0]->abnormal_palate == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_palate2">No</label>
                            </div>

                             <div class="form-group mt-3">
                                <label for="abnormal_palate_injury">Ingrese lesiones de paladar</label>
                                <textarea class="form-control" name="abnormal_palate_injury" rows="3" value="{{ $DentalHistory[0]->abnormal_palate_injury }}">{{ $DentalHistory[0]->abnormal_palate_injury }}</textarea>
                            </div>  
                    </div>

                </div>

                <div class="form-row">

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Lengua anormal?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_tongue1" name="abnormal_tongue" value="1" {{ ($DentalHistory[0]->abnormal_tongue == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_tongue1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_tongue2" name="abnormal_tongue" value="0" {{ ($DentalHistory[0]->abnormal_tongue == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_tongue2">No</label>
                            </div>

                             <div class="form-group mt-3">
                                <label for="abnormal_tongue_injury">Ingrese lesiones de lengua</label>
                                <textarea class="form-control" name="abnormal_tongue_injury" rows="3" value="{{ $DentalHistory[0]->abnormal_tongue_injury }}">{{ $DentalHistory[0]->abnormal_tongue_injury }}</textarea>
                            </div>  
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Lengua inferior anormal?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_under_tongue1" name="abnormal_under_tongue" value="1" {{ ($DentalHistory[0]->abnormal_under_tongue == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_under_tongue1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="abnormal_under_tongue2" name="abnormal_under_tongue" value="0" {{ ($DentalHistory[0]->abnormal_under_tongue == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="abnormal_under_tongue2">No</label>
                            </div>

                             <div class="form-group mt-3">
                                <label for="abnormal_under_tongue_injury">Ingrese lesiones de lengua inferior</label>
                                <textarea class="form-control" name="abnormal_under_tongue_injury" rows="3" value="{{ $DentalHistory[0]->abnormal_under_tongue_injury }}">{{ $DentalHistory[0]->abnormal_under_tongue_injury }}</textarea>
                            </div>  
                    </div>

                     <div class="col-sm-3">
                            <label for="anywhere_else_abnormal">Cualquier otra anomalia</label>
                            <textarea class="form-control" name="anywhere_else_abnormal" rows="5" value="{{ $DentalHistory[0]->anywhere_else_abnormal }}">{{ $DentalHistory[0]->anywhere_else_abnormal }}</textarea>
                    </div>

                     <div class="col-sm-3">
                            <label for="how_is_injury">Como es la lesion?</label>
                            <textarea class="form-control" name="how_is_injury" rows="5" value="{{ $DentalHistory[0]->how_is_injury }}">{{ $DentalHistory[0]->how_is_injury }}</textarea>
                    </div>

                </div>

                <div class="form-row">

                     <div class="col-sm-6">
                        <h4 class="custom-control-inline">Lesion con pus?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="injury_has_pus1" name="injury_has_pus" value="1" {{ ($DentalHistory[0]->injury_has_pus == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="injury_has_pus1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="injury_has_pus2" name="injury_has_pus" value="0" {{ ($DentalHistory[0]->injury_has_pus == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="injury_has_pus2">No</label>
                            </div>

                             <div class="form-group mt-3">
                                <label for="when_has_pus">Cuando inicio con pus</label>
                                <textarea class="form-control" name="when_has_pus" rows="3" value="{{ $DentalHistory[0]->when_has_pus }}">{{ $DentalHistory[0]->when_has_pus }}</textarea>
                            </div>  
                    </div>

                    <div class="col-sm-6">
                        <h4 class="custom-control-inline">Tiene ulceras?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="has_ulcers1" name="has_ulcers" value="1" {{ ($DentalHistory[0]->has_ulcers == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="has_ulcers1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="has_ulcers2" name="has_ulcers" value="0" {{ ($DentalHistory[0]->has_ulcers == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="has_ulcers2">No</label>
                            </div>

                             <div class="form-group mt-3">
                                <label for="when_has_ulcers">Cuando iniciaron con ulceras?</label>
                                <textarea class="form-control" name="when_has_ulcers" rows="3" value="{{ $DentalHistory[0]->when_has_ulcers }}">{{ $DentalHistory[0]->when_has_ulcers }}</textarea>
                            </div>  
                    </div>

                </div>


                <hr>

                {{-- Antecedentes Personales No Patologicos --}}

                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h3 class="mb-0">Antecedentes Personales No Patologicos</h3>
                    </div>
                </div>

                <div class="form-row">

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Paciene drogado?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="drugs1" name="drugs" value="1" {{ ($NoPersonalPathological[0]->drugs == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="drugs1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="drugs2" name="drugs" value="0" {{ ($NoPersonalPathological[0]->drugs == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="drugs2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="drugs_take">Drogas ingeridas</label>
                                <textarea class="form-control" name="drugs_take" rows="3" value="{{ $NoPersonalPathological[0]->drugs_take }}">{{ $NoPersonalPathological[0]->drugs_take }}</textarea>
                            </div>  
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Paciente fuma?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="smoke1" name="smoke" value="1" {{ ($NoPersonalPathological[0]->smoke == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="smoke1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="smoke2" name="smoke" value="0" {{ ($NoPersonalPathological[0]->smoke == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="smoke2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="smoke_frequency">Con que frecuencia?</label>
                                <textarea class="form-control" name="smoke_frequency" rows="3" value="{{ $NoPersonalPathological[0]->smoke_frequency }}">{{ $NoPersonalPathological[0]->smoke_frequency }}</textarea>
                            </div>  
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Paciente consume alcohol?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="alcohol1" name="alcohol" value="1" {{ ($NoPersonalPathological[0]->alcohol == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="alcohol1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="alcohol2" name="alcohol" value="0" {{ ($NoPersonalPathological[0]->alcohol == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="alcohol2">No</label>
                            </div>

                             <div class="form-group ">
                                <label for="alcohol_frequency">Con que frecuencia?</label>
                                <textarea class="form-control" name="alcohol_frequency" rows="3" value="{{ $NoPersonalPathological[0]->alcohol_frequency }}">{{ $NoPersonalPathological[0]->alcohol_frequency }}</textarea>
                            </div>  
                    </div>

                     <div class="col-sm-3">
                        <h4 class="custom-control-inline">Paciente emabarazada?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pregnant1" name="pregnant" value="1" {{ ($NoPersonalPathological[0]->pregnant == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="pregnant1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="pregnant2" name="pregnant" value="0" {{ ($NoPersonalPathological[0]->pregnant == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="pregnant2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="pregnant_weeks">Semanas de embarazo?</label>
                                <textarea class="form-control" name="pregnant_weeks" rows="3" value="{{ $NoPersonalPathological[0]->pregnant_weeks }}">{{ $NoPersonalPathological[0]->pregnant_weeks }}</textarea>
                            </div> 
                            
                    </div>
                </div>

                <div class="form-row">
                     <div class="col-sm-6">
                        
                        <div class="form-group">
                            <label for="pregnancy_number">Cantidad de embarazos?</label>
                            <textarea class="form-control" name="pregnancy_number" rows="1" value="{{ $NoPersonalPathological[0]->pregnancy_number }}">{{ $NoPersonalPathological[0]->pregnancy_number }}</textarea>
                        </div> 
                            
                    </div>

                     <div class="col-sm-6">

                         <div class="form-group">
                            <label for="d_p_p" class="form-control-label">Fecha posible parto</label>
                            <input class="form-control" type="date" name="d_p_p" value="{{ $NoPersonalPathological[0]->d_p_p }}">
                        </div>
                            
                    </div>

                </div>


                  {{-- Antecedentes Personales Patologicos --}}

                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h3 class="mb-0">Antecedentes Personales Patologicos</h3>
                    </div>
                </div>
                
                <div class="form-row">

                        <div class="col-sm-3">
                            
                            <h4 class="custom-control-inline">Paciente tuvo sarampion?</h4>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sarampion1" name="sarampion" value="1" {{ ($PersonalPathological[0]->sarampion == '1')? "checked" : "" }} class="custom-control-input" required>
                                    <label class="custom-control-label" for="sarampion1">Si</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="sarampion2" name="sarampion" value="0" {{ ($PersonalPathological[0]->sarampion == '0')? "checked" : "" }} class="custom-control-input" required>
                                    <label class="custom-control-label" for="sarampion2">No</label>
                                </div>

                            <h4 class="custom-control-inline">Paciente tuvo rubeola?</h4>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="rubeola1" name="rubeola" value="1" {{ ($PersonalPathological[0]->rubeola == '1')? "checked" : "" }} class="custom-control-input" required>
                                    <label class="custom-control-label" for="rubeola1">Si</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="rubeola2" name="rubeola" value="0" {{ ($PersonalPathological[0]->rubeola == '0')? "checked" : "" }} class="custom-control-input" required>
                                    <label class="custom-control-label" for="rubeola2">No</label>
                                </div>

                            <h4 class="custom-control-inline">Paciente tuvo varicela?</h4>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="varicela1" name="varicela" value="1" {{ ($PersonalPathological[0]->varicela == '1')? "checked" : "" }} class="custom-control-input" required>
                                    <label class="custom-control-label" for="varicela1">Si</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="varicela2" name="varicela" value="0" {{ ($PersonalPathological[0]->varicela == '0')? "checked" : "" }} class="custom-control-input"  required>
                                    <label class="custom-control-label" for="varicela2">No</label>
                                </div>

                            </div>

                      <div class="col-sm-3">
                        
                         <h4 class="custom-control-inline">Paciente tuvo parotiditis?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="parotiditis1" name="parotiditis" value="1" {{ ($PersonalPathological[0]->parotiditis == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="parotiditis1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="parotiditis2" name="parotiditis" value="0" {{ ($PersonalPathological[0]->parotiditis == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="parotiditis2">No</label>
                            </div>

                           
                         <h4 class="custom-control-inline">Paciente tuvo tosferina?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tosferina1" name="tosferina" value="1" {{ ($PersonalPathological[0]->tosferina == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="tosferina1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tosferina2" name="tosferina" value="0" {{ ($PersonalPathological[0]->tosferina == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="tosferina2">No</label>
                            </div>

                         <h4 class="custom-control-inline">Paciente tuvo escarlatina?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="escarlatina1" name="escarlatina" value="1" {{ ($PersonalPathological[0]->escarlatina == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="escarlatina1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="escarlatina2" name="escarlatina" value="0" {{ ($PersonalPathological[0]->escarlatina == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="escarlatina2">No</label>
                            </div>

                    </div> 

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="other_childern_sicks">Otras enfermedades infantiles?</label>
                            <textarea class="form-control" name="other_childern_sicks" rows="2" value="{{ $PersonalPathological[0]->other_childern_sicks }}">{{ $PersonalPathological[0]->other_childern_sicks }}</textarea>
                        </div> 
                    </div>

                </div>

                <div class="form-row">
                        
                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Hipertencion arterial</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="hip_art1" name="hip_art" value="1" {{ ($PersonalPathological[0]->hip_art == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="hip_art1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="hip_art2" name="hip_art" value="0" {{ ($PersonalPathological[0]->hip_art == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="hip_art2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="hip_art_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="hip_art_since" rows="3" value="{{ $PersonalPathological[0]->hip_art_since }}">{{ $PersonalPathological[0]->hip_art_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="hip_art_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="hip_art_medicaments" rows="3" value="{{ old('hip_art_medicaments') }}"></textarea>
                            </div> 

                             <div class="form-group">
                                <label for="hip_art_status">Estatus de hipertencion?</label>
                                <textarea class="form-control" name="hip_art_status" rows="3" value="{{ $PersonalPathological[0]->hip_art_status }}">{{ $PersonalPathological[0]->hip_art_status }}</textarea>
                            </div> 
              
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Mellitus</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dia_mell1" name="dia_mell" value="1"  {{ ($PersonalPathological[0]->dia_mell == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="dia_mell1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="dia_mell2" name="dia_mell" value="0" {{ ($PersonalPathological[0]->dia_mell == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="dia_mell2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="dia_mell_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="dia_mell_since" rows="3" value="{{ $PersonalPathological[0]->dia_mell_since }}">{{ $PersonalPathological[0]->dia_mell_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="dia_mell_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="dia_mell_medicaments" rows="3" value="{{ $PersonalPathological[0]->dia_mell_medicaments }}">{{ $PersonalPathological[0]->dia_mell_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="dia_mell_status">Estatus de mellitus?</label>
                                <textarea class="form-control" name="dia_mell_status" rows="3" value="{{ $PersonalPathological[0]->dia_mell_status }}">{{ $PersonalPathological[0]->dia_mell_status }}</textarea>
                            </div> 
              
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Epilepsia</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="epilepsia1" name="epilepsia" value="1" {{ ($PersonalPathological[0]->epilepsia == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="epilepsia1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="epilepsia2" name="epilepsia" value="0" {{ ($PersonalPathological[0]->epilepsia == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="epilepsia2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="epi_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="epi_since" rows="3" value="{{ $PersonalPathological[0]->epi_since }}">{{ $PersonalPathological[0]->epi_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="epi_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="epi_medicaments" rows="3" value="{{ $PersonalPathological[0]->epi_medicaments }}">{{ $PersonalPathological[0]->epi_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="epi_status">Estatus de epilepsia?</label>
                                <textarea class="form-control" name="epi_status" rows="3" value="{{ $PersonalPathological[0]->epi_status }}">{{ $PersonalPathological[0]->epi_status }}</textarea>
                            </div> 
              
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Sida</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sida1" name="sida" value="1"  {{ ($PersonalPathological[0]->sida == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="sida1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="sida2" name="sida" value="0" {{ ($PersonalPathological[0]->sida == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="sida2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="sida_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="sida_since" rows="3" value="{{ $PersonalPathological[0]->sida_since }}">{{ $PersonalPathological[0]->sida_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="sida_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="sida_medicaments" rows="3" value="{{ $PersonalPathological[0]->sida_medicaments }}">{{ $PersonalPathological[0]->sida_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="sida_status">Estatus de sida?</label>
                                <textarea class="form-control" name="sida_status" rows="3" value="{{ $PersonalPathological[0]->sida_status }}">{{ $PersonalPathological[0]->sida_status }}</textarea>
                            </div> 
              
                    </div>

                </div>

                <div class="form-row">
                   
                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Herpes</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="hep_c1" name="hep_c" value="1" {{ ($PersonalPathological[0]->hep_c == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="hep_c1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="hep_c2" name="hep_c" value="0" {{ ($PersonalPathological[0]->hep_c == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="hep_c2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="hep_c_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="hep_c_since" rows="3" value="{{ $PersonalPathological[0]->hep_c_since }}">{{ $PersonalPathological[0]->hep_c_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="hep_c_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="hep_c_medicaments" rows="3" value="{{ $PersonalPathological[0]->hep_c_medicaments }}">{{ $PersonalPathological[0]->hep_c_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="hep_c_status">Estatus de herpes?</label>
                                <textarea class="form-control" name="hep_c_status" rows="3" value="{{ $PersonalPathological[0]->hep_c_status }}">{{ $PersonalPathological[0]->hep_c_status }}</textarea>
                            </div> 
              
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Asma</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="asma1" name="asma" value="1" {{ ($PersonalPathological[0]->asma == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="asma1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="asma2" name="asma" value="0" {{ ($PersonalPathological[0]->asma == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="asma2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="asma_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="asma_since" rows="3" value="{{ $PersonalPathological[0]->asma_since }}">{{ $PersonalPathological[0]->asma_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="asma_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="asma_medicaments" rows="3" value="{{ $PersonalPathological[0]->asma_medicaments }}">{{ $PersonalPathological[0]->asma_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="asma_status">Estatus de asma?</label>
                                <textarea class="form-control" name="asma_status" rows="3" value="{{ $PersonalPathological[0]->asma_status }}">{{ $PersonalPathological[0]->asma_status }}</textarea>
                            </div> 
              
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Artitris</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="artitris1" name="artitris" value="1" {{ ($PersonalPathological[0]->artitris == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="artitris1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="artitris2" name="artitris" value="0" {{ ($PersonalPathological[0]->artitris == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="artitris2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="artritis_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="artritis_since" rows="3" value="{{ $PersonalPathological[0]->artritis_since }}">{{ $PersonalPathological[0]->artritis_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="artritis_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="artritis_medicaments" rows="3" value="{{ $PersonalPathological[0]->artritis_medicaments }}">{{ $PersonalPathological[0]->artritis_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="artritis_status">Estatus de artritis?</label>
                                <textarea class="form-control" name="artritis_status" rows="3" value="{{ $PersonalPathological[0]->artritis_status }}">{{ $PersonalPathological[0]->artritis_status }}</textarea>
                            </div> 
              
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Tiroidismo</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiroidismo1" name="tiroidismo" value="1" {{ ($PersonalPathological[0]->tiroidismo == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="tiroidismo1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="tiroidismo2" name="tiroidismo" value="0" {{ ($PersonalPathological[0]->tiroidismo == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="tiroidismo2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="tiroidismos_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="tiroidismos_since" rows="3" value="{{ $PersonalPathological[0]->tiroidismos_since }}">{{ $PersonalPathological[0]->tiroidismos_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="tiroidismos_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="tiroidismos_medicaments" rows="3" value="{{ $PersonalPathological[0]->tiroidismos_medicaments }}">{{ $PersonalPathological[0]->tiroidismos_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="tiroidismos_status">Estatus de tiroidismo?</label>
                                <textarea class="form-control" name="tiroidismos_status" rows="3" value="{{ $PersonalPathological[0]->tiroidismos_status }}">{{ $PersonalPathological[0]->tiroidismos_status }}</textarea>
                            </div> 
              
                    </div>

                </div>

                <div class="form-row">

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Cancer</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="cancer1" name="cancer" value="1" {{ ($PersonalPathological[0]->cancer == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="cancer1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="cancer2" name="cancer" value="0" {{ ($PersonalPathological[0]->cancer == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="cancer2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="cancer_since">Desde que edad se presenta?</label>
                                <textarea class="form-control" name="cancer_since" rows="3" value="{{ $PersonalPathological[0]->cancer_since }}">{{ $PersonalPathological[0]->cancer_since }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="cancer_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="cancer_medicaments" rows="3" value="{{ $PersonalPathological[0]->cancer_medicaments }}">{{ $PersonalPathological[0]->cancer_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="cancer_status">Estatus de cancer?</label>
                                <textarea class="form-control" name="cancer_status" rows="3" value="{{ $PersonalPathological[0]->cancer_status }}">{{ $PersonalPathological[0]->cancer_status }}</textarea>
                            </div> 
              
                    </div>

                    <div class="col-sm-3">
                        <h4 class="custom-control-inline">Otras emfermedades</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="other_actual_sicks1" name="other_actual_sicks" value="1" {{ ($PersonalPathological[0]->other_actual_sicks == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="other_actual_sicks1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="other_actual_sicks2" name="other_actual_sicks" value="0" {{ ($PersonalPathological[0]->other_actual_sicks == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="other_actual_sicks2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="wath_other_actual_sicks">Ingrese las otras emfermedades</label>
                                <textarea class="form-control" name="wath_other_actual_sicks" rows="3" value="{{ $PersonalPathological[0]->wath_other_actual_sicks }}">{{ $PersonalPathological[0]->wath_other_actual_sicks }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="wath_other_actual_sicks_medicaments">Medicamentos recetados?</label>
                                <textarea class="form-control" name="wath_other_actual_sicks_medicaments" rows="3" value="{{ $PersonalPathological[0]->wath_other_actual_sicks_medicaments }}">{{ $PersonalPathological[0]->wath_other_actual_sicks_medicaments }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="wath_other_actual_sicks_status">Estatus de cancer?</label>
                                <textarea class="form-control" name="wath_other_actual_sicks_status" rows="3" value="{{ $PersonalPathological[0]->wath_other_actual_sicks_status }}">{{ $PersonalPathological[0]->wath_other_actual_sicks_status }}</textarea>
                            </div> 

                    </div>

                    <div class="col-sm-3">

                        <h4 class="custom-control-inline">Coagulacion en sangre</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="blood_coagulation1" name="blood_coagulation" value="1" {{ ($PersonalPathological[0]->blood_coagulation == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="blood_coagulation1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="blood_coagulation2" name="blood_coagulation" value="0" {{ ($PersonalPathological[0]->blood_coagulation == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="blood_coagulation2">No</label>
                            </div>

                            <div class="form-group">
                                <label for="wath_other_actual_sicks_status">Alergias</label>
                                <textarea class="form-control" name="wath_other_actual_sicks_status" rows="3" value="{{ $PersonalPathological[0]->wath_other_actual_sicks_status }}">{{ $PersonalPathological[0]->wath_other_actual_sicks_status }}</textarea>
                            </div> 

                        <h4 class="custom-control-inline">Problemas de riñon?</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kidney_problems1" name="kidney_problems" value="1" {{ ($PersonalPathological[0]->kidney_problems == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="kidney_problems1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="kidney_problems2" name="kidney_problems" value="0" {{ ($PersonalPathological[0]->kidney_problems == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="kidney_problems2">No</label>
                            </div>

                            <div class="form-group">
                                <label for="what_kidney_problems">Que problemas renales?</label>
                                <textarea class="form-control" name="what_kidney_problems" rows="3" value="{{ $PersonalPathological[0]->what_kidney_problems }}">{{ $PersonalPathological[0]->what_kidney_problems }}</textarea>
                            </div>

                    </div>
                    
                     <div class="col-sm-3">

                        <h4 class="custom-control-inline">Coagulacion con el higado</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="liver_problems1" name="liver_problems" value="1" {{ ($PersonalPathological[0]->liver_problems == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="liver_problems1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="liver_problems2" name="liver_problems" value="0" {{ ($PersonalPathological[0]->liver_problems == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="liver_problems2">No</label>
                            </div>

                            <div class="form-group">
                                <label for="what_liver_problems">Que problemas de higado?</label>
                                <textarea class="form-control" name="what_liver_problems" rows="3" value="{{ $PersonalPathological[0]->what_liver_problems }}">{{ $PersonalPathological[0]->what_liver_problems }}</textarea>
                            </div> 

                        <h4 class="custom-control-inline">Ets</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="ets1" name="ets" value="1" {{ ($PersonalPathological[0]->ets == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="ets1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="ets2" name="ets" value="0" {{ ($PersonalPathological[0]->ets == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="ets2">No</label>
                            </div>

                            <div class="form-group">
                                <label for="wath_ets">Que ets contrajo?</label>
                                <textarea class="form-control" name="wath_ets" rows="3" value="{{ $PersonalPathological[0]->wath_ets }}">{{ $PersonalPathological[0]->wath_ets }}</textarea>
                            </div>
                            
                    </div>     

                </div>

                <div class="form-row">
                    <div class="col-sm-12">
                        <h4 class="custom-control-inline">Cirujias</h4>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="surgeries1" name="surgeries" value="1" {{ ($PersonalPathological[0]->surgeries == '1')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="surgeries1">Si</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="surgeries2" name="surgeries" value="0" {{ ($PersonalPathological[0]->surgeries == '0')? "checked" : "" }} class="custom-control-input" required>
                                <label class="custom-control-label" for="surgeries2">No</label>
                            </div>

                             <div class="form-group">
                                <label for="surgeries_reason">Razon de cirujia?</label>
                                <textarea class="form-control" name="surgeries_reason" rows="3" value="{{ $PersonalPathological[0]->surgeries_reason }}">{{ $PersonalPathological[0]->surgeries_reason }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="blood_transfution">Transfucion de sangre?</label>
                                <textarea class="form-control" name="blood_transfution" rows="3" value="{{ $PersonalPathological[0]->blood_transfution }}">{{ $PersonalPathological[0]->blood_transfution }}</textarea>
                            </div> 

                             <div class="form-group">
                                <label for="blood_transfution_reason">Razon transfucion de sangre?</label>
                                <textarea class="form-control" name="blood_transfution_reason" rows="3" value="{{ $PersonalPathological[0]->blood_transfution_reason }}">{{ $PersonalPathological[0]->blood_transfution_reason }}</textarea>
                            </div> 

                    </div>
                </div>

                <br>
               
                <button type="submit" class="btn btn-sm btn-primary mt-3">Actualizar paciente</button>
            </form>
        </div>

    </div>
       </div>
    </div>

    
@endsection