<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service as ServiceModel;
use App\Livewire\Forms\admin\Vouchers as Vocs;
use FrittenKeeZ\Vouchers\Models\Voucher;
use FrittenKeeZ\Vouchers\Models\VoucherEntity;
class Vouchers extends Component
{
    use WithPagination;

    public Vocs $form;

    public function save(){
        
        try{
            $this->form->store();
            $this->dispatch('Notifier',
                    title: 'Success!',
                    text: 'Berhasil Membuat Vouchers!, Silahkan di check di bagian table di bawah!',
                    icon: 'success',
                );
        }catch(\Exception $e){
            $this->dispatch('Notifier',
            title: 'Error!',
            text: $e->validator->errors()->all(),
            icon: 'error',);
        }
    }

    public function render()
    {
        $serviceData = ServiceModel::orderBy('service_name', 'asc')->get();
        
        $VocR = Voucher::whereNotNull('redeemed_at')->orderBy('created_at', 'desc')->paginate(10);
        $VocU = Voucher::whereNull('redeemed_at')->orderBy('created_at', 'desc')->paginate(10);
        return view('livewire.admin.vouchers', [
            'service' => $serviceData,
            'VocR' => $VocR,
            'VocU' => $VocU
        ])->layout('layouts.app');
    }
}
