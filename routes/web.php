<?php

use App\Http\Controllers\ConfirmController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ListviewController;

use App\Http\Controllers\Auth\AuthenticatedSessionController;

use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/confirm', [ConfirmController::class, 'index'])->name('confirm');

Route::post('/makepost', [ConfirmController::class, 'makePost'])->name('makePost');

Route::get("/listview", [ListviewController::class, 'index'])->middleware('auth')->name('listview');
Route::get("/search", [ListviewController::class, 'search'])->name('search');


Route::get('register', [RegisteredUserController::class, 'create'])
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('loginReq', [AuthenticatedSessionController::class, 'login'])->name('loginReq');

require __DIR__ . '/auth.php';
