<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

use App\Models\Transaction;
use Auth;

class Payment extends Component
{
    use WithFileUploads;
    public $trxID;


    #[Validate('required|image|max:2048')]
    public $photo;

    function mount(){
        $this->trxID = request()->route('trx_id');
        $transaksiCheck = Transaction::where('transactions_id', $this->trxID)->exists();
        if(!$transaksiCheck){
            abort(404);
        }
    }

    public function save(){
        try{
            $this->validate();
            $path = $this->photo->store(path: 'photos');
            $trans = Transaction::where('transactions_id', $this->trxID)
                             ->where('status', 0)
                             ->first();

            if ($trans) {
                $trans->proof_of_payment = $path;
                $trans->save();

                $this->dispatch('Notifier',
                    title: 'Success!',
                    text: 'Successfully uploaded payment proof. Your transaction will be processed shortly!.',
                    icon: 'success',
                );
            } else {
                $this->dispatch('Notifier',
                title: 'Error!',
                text: "Transaction not found",
                icon: 'error',);
                return;
            }
        }catch(\Exception $e){
            $this->dispatch('Notifier',
            title: 'Error!',
            text: $e->validator->errors()->all() ?: 'Please Contact Admin',
            icon: 'error',);
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
        return view('livewire.transaction.payment', [
            'trans' => $trans,
        ])->layout('layouts.app');
    }
}
