<?php

namespace App\Livewire\Admin;

use Livewire\Component;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Service;

use Auth;

class TransaksiDetail extends Component
{
    public $trxID;

    function mount(){
        $this->trxID = request()->route('trx_id');
        $transaksiCheck = Transaction::where('transactions_id', $this->trxID)->exists();
        if(!$transaksiCheck){
            abort(404);
        }
    }
    public function submit() {
        $transaksi = Transaction::where('transactions_id', $this->trxID)
        ->where('status', 0)
        ->where('user_id', Auth::id())
        ->first();
        if ($transaksi) {
            $transaksi->status = 1;
            $transaksi->save();

            $service = Service::find($transaksi->service_id);
            $user = User::find($transaksi->user_id);
            $user->balance += $service->service_name;
            $user->save();


            $this->dispatch('Notifier',
                title: 'Success!',
                text: 'SUKSES APPROVE PAYMENT!!!.',
                icon: 'success',
            );
        } else {
            $this->dispatch('Notifier',
            title: 'Error!',
            text: "Transaction not found",
            icon: 'error',);
            return;
        }
    }

    public function cancelPayment(){
        $trans = Transaction::where('transactions_id', $this->trxID)
                             ->where('status', 0)
                             ->first();

        if ($trans) {
            $trans->status = -1;
            $trans->save();

            $this->dispatch('Notifier',
                title: 'Success!',
                text: 'The payment has been successfully canceled!.',
                icon: 'success',
            );
        } else {
            $this->dispatch('Notifier',
            title: 'Error!',
            text: "Transaction not found",
            icon: 'error',);
            return;
        }
    }


    public function render()
    {
        $trans = Transaction::where('transactions_id', $this->trxID)->where('user_id', Auth::id())->firstOrFail();
        return view('livewire.admin.transaksi-detail', [
            'trans' => $trans,
        ])->layout('layouts.app');
    }
}
