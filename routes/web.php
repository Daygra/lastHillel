<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/our.doctors','Patient\PatientController@showDoctors')->name('our.doctors');
    Route::get('/our.doctor.schedule/{id}','Patient\PatientController@showDoctorsSchedule')->name('doctor.schedule');
    Route::get('/schedule/{id}','Patient\PatientController@changeSingUpStatus')->name('changeSingUpStatus');
    Route::get('/my.appointments','Patient\PatientController@showAppointments')->name('appointments');
});

Route::middleware('auth','doctor.check')->group(function () {
    Route::get('/schedulesControl', 'Doctor\DoctorController@scheduleShow')->name('schedulesControl');
    Route::delete('/schedule.delete/{id}', 'Doctor\DoctorController@deleteSchedule')->name('deleteSchedule');
    Route::post('/addSchedule', 'Doctor\DoctorController@addSchedule')->name('addSchedule');
});


Route::get('/appointment/{url}', 'ApointmentController@index')->name('appointment');


Route::get('/appointment/download/{id}', 'ApointmentController@pdf')->name('pdf');
