<?php

use Illuminate\Support\Facades\Route;

// Route::view('/',function () {
//     return redirect('/login');
// });
// Route::view('profile', 'profile')
//     ->middleware(['auth'])
//     ->name('profile');
// Route::get('dashboard', App\Livewire\Dashboard::class)
//     ->middleware(['auth', 'verified'])
    
Route::get('/', function () {
    return redirect()->route('login');
});


Route::middleware(['auth', 'logout.banned', 'role:member|admin'])->group(function () {
    Route::get('dashboard', App\Livewire\Dashboard::class)->name('dashboard');

    Route::get('/transaction/deposit', App\Livewire\transaction\Deposit::class)->name('trans_depo');
    Route::get('/transaction/{trx_id}/payment', App\Livewire\transaction\Payment::class)->name('trans_payment');
    Route::get('/transaction/history', App\Livewire\transaction\History::class)->name('trans_history');



    Route::get('card-check/stripe/gate-1', App\Livewire\CardCheck\Gate1::class)->name('gate1');
    Route::post('/card-check/gate-1/check', [App\Http\Controllers\CardCheck\gate1::class, 'card_gate1_check']);



    // ADMIN

    Route::name('admin.')->prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('voucher', App\Livewire\Admin\Vouchers::class)->name('voucher');
        Route::get('services', App\Livewire\Admin\Service::class)->name('service');
        Route::get('transaction', App\Livewire\Admin\Transaksi::class)->name('transaksi');
        Route::get('transaction/{trx_id}/details', App\Livewire\Admin\TransaksiDetail::class)->name('transaksiDetail');
        Route::get('/users', App\Livewire\Admin\Users::class)->name('users');
    });
});






require __DIR__.'/auth.php';
