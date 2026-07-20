<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

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

    // Invoice Routes
    Route::resource('invoices', InvoiceController::class);
    Route::patch('/invoices/{invoice}/send', [InvoiceController::class,'send'])->name('invoices.send');

    Route::get('transaction', [TransactionController::class,'index'])->name('transactions.index');
    });

Route::get('invoice/{invoice}/pay', [InvoiceController::class,'pay'])->name('invoices.pay');

// Stripe Checkout Routes
Route::get('checkout/success', [InvoiceController::class, 'success'])->name('checkout.success');
Route::get('checkout/cancel', [InvoiceController::class, 'cancel'])->name('checkout.cancel');

require __DIR__.'/auth.php';
