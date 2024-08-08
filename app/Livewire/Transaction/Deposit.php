<?php

namespace App\Livewire\Transaction;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Models\Service;
use App\Models\Transaction;
use Auth;


class Deposit extends Component
{
    public $price = null;
    // public $selectedService = null;

    #[Validate('required|numeric|exists:services,id')]
    public $selectedService;

    #[Validate('required')]
    public $paymentMethod;

    public function updatedSelectedService($serviceId)
    {
        // Ketika service dipilih, ambil harga dari database
        $service = Service::find($serviceId);
        $this->price = $service ? $service->price : null;
    }

    public function save(){

        try{
            $this->validate();
            if($this->paymentMethod == false){
                $this->dispatch('Notifier',
                title: 'Error!',
                text: "The payment method field is required.",
                icon: 'error',);
                return;

            }
            $CekStatusTrans = Transaction::where('user_id', Auth::id())->where('status', 0)->exists();
            if($CekStatusTrans){
                $this->dispatch('Notifier',
                title: 'Error!',
                text: "You have an unresolved transaction. Please settle it before continuing.",
                icon: 'error',);
                return;
            }

            $CekStatusSer = Service::find($this->selectedService)->where('status', false)->exists();
            if($CekStatusSer){
                $this->dispatch('Notifier',
                title: 'Error!',
                text: "Please contact admin!",
                icon: 'error',);
                return;
            }

            $ser = Service::find($this->selectedService);

            $clo = now();
            $clo = str_replace('-',"",$clo);
            $clo2 =  explode(' ',$clo);
            $clo3 =  explode(':',$clo2[1]);
            $cloc = substr($clo2[0], 2);

            $characters = '23456';
            $token = '';

            for ($i = 0; $i < 2; $i++) {
                $token .= $characters[rand(0, strlen($characters) - 1)];
            }

            $idtrans = 'TRX-IDCHK'.$cloc.$clo3[2].rand(11, 99).rand(11, 99);

            $transaksi = new Transaction;
            $transaksi->transactions_id = $idtrans;
            $transaksi->user_id = Auth::id();
            $transaksi->service_id = $ser->id;
            $transaksi->payment_method = 1;
            $transaksi->total_amount = (int)$ser->price + (int)$token;
            $transaksi->proof_of_payment = "";
            $transaksi->save();

            $this->redirect(route('trans_payment', $transaksi->transactions_id), navigate: true);


        } catch(\Exception $e){
            $this->dispatch('Notifier',
            title: 'Error!',
            text: $e->validator->errors()->all(),
            icon: 'error',);
        }

    }

    public function render()
    {
        $service = Service::where('status', true)->orderBy('service_name')->get();
        return view('livewire.transaction.deposit',[
            'services' => $service,
        ])->layout('layouts.app');
    }
}
