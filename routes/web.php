<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrinterController;
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
    return view('welcome');
});

Route::prefix('admin')->middleware('auth', 'role:admin')->group(function () {
    Route::get('/', [PrinterController::class, 'index'])->name('dashboard');

    // update
    Route::get('edit-item/update/{id}', [PrinterController::class, 'edit'])->name('editItem');
});


Route::get('/inputItem', function () {
    return view('Admin.input');
})->middleware(['auth', 'role:admin'])->name('inputItem');

Route::get('/user', function () {
    return view('user');
})->middleware(['auth', 'role:user'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
