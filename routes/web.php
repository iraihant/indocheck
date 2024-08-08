<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('dashboard', App\Livewire\Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/transaction/deposit', App\Livewire\transaction\Deposit::class)->name('trans_depo');
Route::get('/transaction/{trx_id}/payment', App\Livewire\transaction\Payment::class)->name('trans_payment');
Route::get('/transaction/history', App\Livewire\transaction\History::class)->name('trans_history');


Route::view('card-check/stripe/gate-1', 'gate1')->name('gate1');




// ADMIN

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('voucher', App\Livewire\admin\Vouchers::class)->name('voucher');
    // Route::view('service', 'admin-service')->name('service');
    Route::get('services', App\Livewire\Admin\Service::class)->name('service');
});




require __DIR__.'/auth.php';
