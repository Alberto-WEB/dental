<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Dentist\PatientController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
	return view('welcome');
});

Auth::routes(['verify' => true]);

route::middleware(['verified'])->group(function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Registro del Dentista
Route::post('/register', [RegisterController::class, 'register']);

//autenticacion dentista
Route::middleware(['verified', 'auth'])->group(function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//CRUD de pacientes
Route::middleware(['verified', 'auth'])->group(function () {
	Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
});
