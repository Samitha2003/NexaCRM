<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProposalController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Customer Routes
    Route::resource('customers', CustomerController::class);
    Route::patch('/customers/{customer}/toggle', [CustomerController::class,'toggleStatus'])->name('customers.toggle-status');

    // Proposal Routes
    Route::resource('proposals', ProposalController::class);
    Route::patch('/proposals/{proposal}/status', [ProposalController::class,'updateStatus'])->name('proposals.update-status');
});

require __DIR__.'/auth.php';
