<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::get('/home', [HomeController::class, 'topShows'])->name('home');

Route::resource('shows', ShowController::class)->except('edit')->names([
    'index' => 'shows'
])->middleware('auth');

Route::get('/shows/{show}/edit', [ShowController::class,'edit'])->name('shows.edit');
Route::patch('/shows/{show}/update', [ShowController::class,'update'])->name('shows.update');

Route::post('/shows/{show}', [ShowController::class,'show'])->name('shows.show');
Route::post('/shows', [ShowController::class, 'store'])->name('shows.store');

Route::get('/login', [SessionController::class,'create'])->name('login');
Route::post('/login', [SessionController::class,'store']);
Route::post('/logout', [SessionController::class,'destroy']);
Route::get('/register', [RegisteredUserController::class,'create']);
Route::post('/register', [RegisteredUserController::class,'store']);


Route::get('/shows/{id}/seats', [SeatController::class, 'index'])->name('seats.index');

Route::get('/showTickets', [SeatController::class, 'show'])->name('seats.show');


Route::post('/seats/confirm', [ReservationController::class, 'confirmReservation'])->name('seats.confirm')->middleware('auth');
Route::post('/seats/reserve', [ReservationController::class, 'store'])->name('seats.store');



Route::get('/settings', [SettingsController::class, 'index'])->name('settings')
    ->middleware('auth');
Route::post('/settings', [SettingsController::class, 'update'])
    ->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show')->middleware('auth');
Route::get('/review/{show}/{user}', [ProfileController::class, 'review'])->name('profile.review')->middleware('auth');
Route::delete('/reservation/{reservation}', [ProfileController::class, 'destroy'])->name('reservation.destroy');
