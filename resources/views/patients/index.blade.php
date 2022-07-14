@extends('layouts.app', ['class' => 'bg-default'])

@section('title', 'Lista de Pacientes')

@section('content')
    <div class="header bg-gradient-primary py-5 py-lg-7 py-sm-7">
         <div class="container-fluid">
            <div class="card shadow">
        <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Lista Pacientes</h3>
            </div>
            <div class="col text-right">
            <a href="{{ url('/patients/create') }}" class="btn btn-sm btn-success">Nuevo Paciente</a>
            </div>
        </div>
        </div>

        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="ni ni-like-2"></i></span>
                    {{ session('notification') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        
        <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Direccion</th>
                <th scope="col">Telefono</th>
                {{-- <th scope="col">Religion</th>
                <th scope="col">Ocupacion</th>
                <th scope="col">Estatus Civil</th> 
                <th scope="col" class="sort" data-sort="status">Estatus</th>--}}
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
                @if ($patients->count())
                    @foreach ($patients as $patient)
                        <tr>
                            <th scope="row">
                                {{ $patient->name }}
                            </th>
                            <td>
                                {{ $patient->email_patient }}
                            </td>
                            <td>
                                {{ $patient->age }}
                            </td>
                            <td>
                                {{ $patient->sex }}
                            </td>
                            <td>
                                {{ $patient->address }}
                            </td>
                            <td>
                                {{ $patient->phone }}
                            </td>
                        {{--  <td>
                                {{ $patient->religion }}
                            </td>
                            <td>
                                {{ $patient->occupation }}
                            </td>
                            <td>
                                {{ $patient->civil_status }}
                            </td> --}}
                            {{-- <td>
                                <span class="badge badge-dot mr-4">
                                    <i class="bg-success"></i>
                                    <span class="status">{{ $patient->status }}</span>
                                </span>
                            </td> --}}
                            <td>
                            <form action="{{ url('/patients/'.$patient->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('/patients/'.$patient->id.'/edit') }}" class="btn btn-sm btn-primary">Editar</a>
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                            </td>
                            
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No hay pacientes registrados</td>
                    </tr>
                @endif
            </tbody>
        </table>
        </div>
        <div class="card-body">
            {{ $patients->links() }}
        </div>

        </div>
        </div>
         </div>
    </div>

    
@endsection
