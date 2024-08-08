<?php

namespace App\Livewire\Transaction;

use Livewire\Component;

use App\Models\Service;
use App\Models\Transaction;
use Auth;

class Payment extends Component
{
    public $trxID;
    function mount(){
        $this->trxID = request()->route('trx_id');
        $transaksiCheck = Transaction::where('transactions_id', $this->trxID)->exists();
        if(!$transaksiCheck){
            abort(404);
        }
    }
    public function render()
    {
        $trans = Transaction::where('transactions_id', $this->trxID)->where('user_id', Auth::id())->firstOrFail();
        return view('livewire.transaction.payment', [
            'trans' => $trans,
        ])->layout('layouts.app');
    }
}
