<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Helpers\Helpers;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [RoomController::class, 'index']);
Route::get('/aboutUs', function () {
    return view('aboutUs');
});
Route::get('/roomsGrid', [RoomController::class, 'showAll']);
Route::get('/roomsList', [RoomController::class, 'availableRooms']);
Route::get('/roomDetails', [RoomController::class, 'show']);
Route::post('/roomDetails', [BookingController::class, 'store']);
Route::get('/offers', [RoomController::class, 'offerRooms']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/bookings', [BookingController::class, 'index']);

require __DIR__ . '/auth.php';
