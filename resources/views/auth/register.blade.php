@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    
                    <div class="card-body px-lg-5 py-lg-5">
                       
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-row">
                                <div class="col{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre') }}" type="text" name="name" value="{{ old('name') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
    
                                <div class="col{{ $errors->has('surname') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('surname') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellido') }}" type="text" name="surname" value="{{ old('surname') }}" required autofocus>
                                    </div>
                                    @if ($errors->has('surname'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('surname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                              </div>

                             
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-row">
                                
                                <div class="col{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-unlock"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-unlock"></i></span>
                                        </div>
                                        <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                    </div>
                                </div>

                            </div>

                           <div class="form-row">

                                <div class="col{{ $errors->has('company_name') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombre de la compañia') }}" type="text" name="company_name" value="{{ old('company_name') }}" required>
                                    </div>
                                    @if ($errors->has('company_name'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('company_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="col{{ $errors->has('rfc') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-file-circle-check"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }}" placeholder="{{ __('RFC') }}" type="text" name="rfc" value="{{ old('rfc') }}" required>
                                    </div>
                                    @if ($errors->has('rfc'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('rfc') }}</strong>
                                        </span>
                                    @endif
                                </div>

                           </div>


                            <div class="form-group{{ $errors->has('street') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-street-view"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" placeholder="{{ __('Direccion') }}" type="text" name="company_name" value="{{ old('company_name') }}" required>
                                </div>
                                @if ($errors->has('street'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-row">
                                <div class="col{{ $errors->has('postal_code') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" placeholder="{{ __('Codigo postal') }}" type="text" name="postal_code" value="{{ old('postal_code') }}" required>
                                    </div>
                                    @if ($errors->has('postal_code'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('postal_code') }}</strong>
                                        </span>
                                    @endif
                                </div>
    
                                <div class="col{{ $errors->has('state') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-map-pin"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" placeholder="{{ __('Estado') }}" type="text" name="state" value="{{ old('state') }}" required>
                                    </div>
                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('state') }}</strong>
                                        </span>
                                    @endif
                                </div>
    
                                <div class="col{{ $errors->has('city') ? ' has-danger' : '' }}">
                                    <div class="input-group input-group-alternative mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fa-solid fa-city"></i></span>
                                        </div>
                                        <input class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="{{ __('Ciudad') }}" type="text" name="city" value="{{ old('city') }}" required>
                                    </div>
                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" style="display: block;" role="alert">
                                            <strong>{{ $errors->first('city') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                           <div class="form-row">
                            <div class="col{{ $errors->has('phone') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefono') }}" type="text" name="phone" value="{{ old('phone') }}" required>
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col{{ $errors->has('house_number') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa-solid fa-house"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('house_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Numero de casa') }}" type="text" name="house_number" value="{{ old('house_number') }}" required>
                                </div>
                                @if ($errors->has('house_number'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('house_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                           </div>
                           
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('Estoy de acuerdo con la') }} <a href="#!">{{ __('Politica de privacidad') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Registrarme') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
