<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $voucher;

    protected $rules = [
        'voucher' => 'required',
    ];
    public function redeemVoucher(){
        $this->validate();
        $voc = Voucher::where('code', $this->voucher)->firstOrFail();
        try {
            Vouchers::redeem($this->voucher, Auth::user(), $voc->metadata);
            $user = Auth::user();
            $user->balance +=  $voc->metadata['credits'];
            $user->save();
            $this->dispatch('voucherRedeem', 
                title: 'Success!',
                text: 'Successfully redeem voucher, balance will be added to your wallet!',
                icon: 'success',
            );
            // session()->flash('success', "Successfully redeem the voucher, ".$voc->metadata['credits']." credits are added to your balance!");
            $this->reset('voucher');
        } catch (\Exception $e) {
            $this->dispatch('voucherRedeem', 
                title: 'Error!',
                text: 'It looks like the voucher code you entered is invalid!',
                icon: 'error',
            );
        }

    }
    
    public function showAlert()
    {
        $this->dispatch('voucherRedeem', 
                title: 'Error!',
                text: 'It looks like the voucher code you entered is invalid!',
                icon: 'error',
            );
    }
    
    public function render()
    {
        return view('livewire.dashboard')->layout('layouts.app');;
    }
}
