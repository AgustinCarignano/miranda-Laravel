<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [RoomController::class, 'index']);
Route::get('/aboutUs', function () {
    return view('aboutUs', ["facilities" => facilities(), "counters" => counters()]);
});
Route::get('/roomsGrid', [RoomController::class, 'showAll']);
Route::get('/roomsList', [RoomController::class, 'availableRooms']);
Route::get('/roomDetails', [RoomController::class, 'show']);
Route::post('/roomDetails', [BookingController::class, 'store']);
Route::get('/offers', [RoomController::class, 'offerRooms']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/bookings', [BookingController::class, 'index']);
