@extends('layouts.app', ['class' => 'bg-default'])

@section('title', 'Nuevo de Pacientes')

@section('content')
    <div class="header bg-gradient-primary py-5 py-lg-7 py-sm-7">
       <div class="container-fluid">
            <div class="card shadow">
        <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Nuevo Paciente</h3>
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

            <form action="{{ url('/pacientes') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="col-sm-5">
                        <label for="name">Nombre del paciente</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                    </div>
                    <div class="col-sm-2">
                        <label for="name">Edad</label>
                        <input type="number" name="age" class="form-control" value="{{ old('age') }}" required>
                    </div>
                    <div class="col-sm-5">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ old('email') }}" required>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label for="adress">Direccion</label>
                    <input type="text" name="adress" class="form-control" value="{{ old('adress') }}" required>
                </div>

                <div class="form-row">
                     <div class="col-sm-3">
                        <label for="phone">Estatus Civil</label>
                        <input type="text" name="civil_status" class="form-control" value="{{ old('civil_status') }}" required>
                    </div>

                    <div class="col-sm-3">
                        <label for="phone">Religion</label>
                        <input type="text" name="religion" class="form-control" value="{{ old('religion') }}" required>
                    </div>
                     <div class="col-sm-3">
                        <label for="phone">Ocupacion</label>
                        <input type="text" name="occupation" class="form-control" value="{{ old('occupation') }}" required>
                    </div>
                     <div class="col-sm-3">
                        <label for="phone">Telefono</label>
                        <input type="number" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>
                </div>
               
                <button type="submit" class="btn btn-sm btn-primary mt-3">Crear paciente</button>
            </form>
        </div>

    </div>
       </div>
    </div>

    
@endsection