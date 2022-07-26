@extends('layouts.app', ['class' => 'bg-default'])

@section('title', 'Lista de Pacientes')

@section('content')
    @livewire('patient.patient-index')
@endsection
