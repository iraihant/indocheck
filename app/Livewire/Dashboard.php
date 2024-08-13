<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;
use FrittenKeeZ\Vouchers\Facades\Vouchers;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\Redeemer;

class Dashboard extends Component
{
    public $voucher;

    
    protected $rules = [
        'voucher' => 'required',
    ];
    public function redeemVoucher(){
        try{

            $this->validate();
            // dd($this->voucher);
            $voc = Voucher::where('code', $this->voucher)->firstOrFail();
            // dd($voc);
            try {
                Vouchers::redeem($this->voucher, Auth::user(), $voc->metadata);
                $user = Auth::user();
                $user->balance +=  $voc->metadata['credits'];
                $user->save();
                $this->dispatch('Notifier', 
                    title: 'Success!',
                    text: 'Successfully redeem voucher, balance will be added to your wallet!',
                    icon: 'success',
                );
                // session()->flash('success', "Successfully redeem the voucher, ".$voc->metadata['credits']." credits are added to your balance!");
                $this->reset('voucher');
            } catch (\Exception $e) {
                $this->dispatch('Notifier', 
                    title: 'Error!',
                    text: 'It looks like the voucher code you entered is invalid!',
                    icon: 'error',
                );
                $this->reset('voucher');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->dispatch('Notifier', 
                    title: 'Error!',
                    text: $e->validator->errors()->all(),
                    icon: 'error',
                );
                $this->reset('voucher');
        }


    }
    
    
    public function render()
    {   
        $redem = Redeemer::where('redeemer_id', Auth::id())->orderBy('created_at', 'desc')->with('voucher')->paginate('10');
        return view('livewire.dashboard', [
            'vouchers' => $redem,
        
        ])->layout('layouts.app');
    }
}
