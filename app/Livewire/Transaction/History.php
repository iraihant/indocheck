<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use Livewire\WithPagination;
use Auth;
use App\Models\Transaction;


class History extends Component
{
    use WithPagination;
    public function render()
    {
        $transaksi = Transaction::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.transaction.history', [
            'trans' => $transaksi,
        ])->layout('layouts.app');
    }
}
