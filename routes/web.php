<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PrinterController;
use App\Http\Controllers\ProfileController;

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
    return view('welcome');
});

Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
    Route::get('/', [PrinterController::class, 'index'])->name('dashboard');
    Route::resource('printer', PrinterController::class);


    // update
    Route::post('printer/update/{id}', [PrinterController::class, 'update'])->name('printer.update');

    // delete
    Route::get('printer/destroy/{id}', [PrinterController::class, 'destroy'])->name('printer.destroy');

    Route::resource('user', UserController::class);
    // update
    Route::post('user/update/{id}', [UserController::class, 'update'])->name('user.update');
});

Route::prefix('user')->middleware('auth', 'role:user')->group(function () {
    Route::resource('/', UserController::class);
    //update
    Route::post('update/{id}', [UserController::class, 'update'])->name('user.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
