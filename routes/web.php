<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('dashboard', App\Livewire\Dashboard::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('/transaction/deposit', 'transaksi.deposit')->name('trans_depo');
Route::view('/transaction/{trx_id}/payment', 'transaksi.payment')->name('trans_payment');



Route::view('card-check/stripe/gate-1', 'gate1')->name('gate1');




// ADMIN

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('voucher', App\Livewire\admin\Vouchers::class)->name('voucher');
    Route::view('service', 'admin-service')->name('service');
    });


    

require __DIR__.'/auth.php';
