<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Patient\PatientController;


Route::get('/', function () {
	return view('welcome');
});

Auth::routes(['verify' => true]);

route::middleware(['verified'])->group(function () {
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

//Registro del Dentista
Route::post('/register', [RegisterController::class, 'register']);
Route::view('/terms-and-conditions', 'terms-and-conditions')->name('user.tyc');
Route::view('/about', 'about')->name('user.about');

//autenticacion dentista
Route::middleware(['verified', 'auth'])->group(function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

//CRUD de pacientes
Route::middleware(['verified', 'auth', 'dentist'])->group(function () {
	Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
	Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
	Route::post('/patients/save', [PatientController::class, 'store'])->name('patients.store');
	Route::get('/patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
	Route::get('/patients/{id}', [PatientController::class, 'show'])->name('patients.show');
	Route::put('/patients/{id}{idinheritFamily}{idDentalHistory}{idNoPersonalPathological}{idPersonalPathological}', [PatientController::class, 'update'])->name('patients.update');
	Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patients.destroy');
	//Route::post('/filter/search', [PatientController::class, 'filter_search'])->name('filter_search');
});
