<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ReservationController;


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
    return view('dashboard');
});
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');


Route::get('/doctors/create', [DoctorController::class, 'create'])->name('doctors.create');
Route::post('/doctors', [DoctorController::class, 'store'])->name('doctors.store');

Route::get('/doctors/{id}/edit', [DoctorController::class, 'edit'])->name('doctors.edit');
Route::put('/doctors/{id}', [DoctorController::class, 'update'])->name('doctors.update');


Route::delete('/doctors/{id}', [DoctorController::class, 'destroy'])->name('doctors.destroy');



Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');


Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

Route::get('/user-reservations', [ReservationController::class, 'showReservations'])->name('user.reservations');
Route::get('/user-reservations/reservations', [ReservationController::class, 'userReservations'])->name('reservationsForUser');

Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');


Route::get('/doctor-reservations', [ReservationController::class, 'getDoctorReservations'])->name('doctor.getRreservations');
Route::get('/doctor-reservations/{doctorId}', [ReservationController::class, 'doctorReservations'])->name('doctor.reservations');
