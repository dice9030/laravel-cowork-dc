<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\DashboardController;
use App\Http\Controllers\Client\Auth\LoginController;
use App\Http\Controllers\Client\Web\HomeController;

use App\Http\Controllers\Admin\ReservationCrudController;
use App\Http\Controllers\Client\Web\ReservationController;

Route::get('/',  [HomeController::class, 'index'])->name('home');

// Rutas de login para clientes
Route::get('client/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('client/login', [LoginController::class, 'login']);

// Rutas protegidas para clientes
Route::group([
    'prefix' => 'client',
    'middleware' => ['web', 'auth', 'role:cliente'],
], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('client.dashboard');
    Route::get('/reservar/{id}', [ReservationController::class, 'reserve'])->name('reservar');
    Route::post('/reservar/{id}', [ReservationController::class, 'processReservation'])->name('process_reservation');
    Route::get('/mis-reservas', [ReservationController::class, 'misReservas'])->name('reservas.mias');        
});


Route::post('client/logout', [App\Http\Controllers\Client\Auth\LoginController::class, 'logout'])->name('client.logout');
Route::get('client/register', [App\Http\Controllers\Client\Auth\RegisterController::class, 'showRegistrationForm'])->name('client.register');
Route::post('client/register', [App\Http\Controllers\Client\Auth\RegisterController::class, 'register']);
// Route::get('admin/reservations/export', [ReservationCrudController::class, 'export']);

Route::get('admin/reservation/export', [ReservationCrudController::class, 'export'])->name('reservation.export');
