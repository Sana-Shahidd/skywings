<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\StaffController;

// Public Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes();

// -------------------------------------------------------
// Admin Routes
// -------------------------------------------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // Cities CRUD
    Route::resource('cities', CityController::class);

    // Flights CRUD
    Route::resource('flights', FlightController::class);

    // Schedules CRUD
    Route::resource('schedules', ScheduleController::class);

    // Bookings
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('bookings');
    Route::get('/bookings/{booking}/edit', [AdminController::class, 'editBooking'])->name('bookings.edit');
    Route::put('/bookings/{booking}', [AdminController::class, 'updateBooking'])->name('bookings.update');
    Route::delete('/bookings/{booking}', [AdminController::class, 'deleteBooking'])->name('bookings.delete');

    // Users (Passengers)
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/{user}/edit', [AdminController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');

    // Staff Management
    Route::get('/staff', [AdminController::class, 'staff'])->name('staff');
    Route::get('/staff/create', [AdminController::class, 'createStaff'])->name('staff.create');
    Route::post('/staff', [AdminController::class, 'storeStaff'])->name('staff.store');
    Route::get('/staff/{user}/edit', [AdminController::class, 'editStaff'])->name('staff.edit');
    Route::put('/staff/{user}', [AdminController::class, 'updateStaff'])->name('staff.update');
    Route::delete('/staff/{user}', [AdminController::class, 'deleteStaff'])->name('staff.delete');

});

// -------------------------------------------------------
// User Routes
// -------------------------------------------------------
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {

    Route::get('/dashboard', [BookingController::class, 'dashboard'])->name('dashboard');
    Route::get('/search', [BookingController::class, 'search'])->name('search');
    Route::get('/book/{schedule}', [BookingController::class, 'book'])->name('book');
    Route::post('/book/{schedule}', [BookingController::class, 'store'])->name('book.store');
    Route::get('/tickets', [BookingController::class, 'tickets'])->name('tickets');
    Route::get('/ticket/{booking}', [BookingController::class, 'show'])->name('ticket.show');
    Route::post('/cancel/{booking}', [BookingController::class, 'cancel'])->name('cancel');

});

// -------------------------------------------------------
// Staff Routes
// -------------------------------------------------------
Route::middleware(['auth'])->prefix('staff')->name('staff.')->group(function () {

    Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
    Route::get('/verify', [StaffController::class, 'verify'])->name('verify');
    Route::post('/verify', [StaffController::class, 'checkPNR'])->name('verify.check');
    Route::get('/logs', [StaffController::class, 'logs'])->name('logs');

});