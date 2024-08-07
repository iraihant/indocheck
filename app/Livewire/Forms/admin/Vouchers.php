<?php

namespace App\Livewire\Forms\admin;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Illuminate\Validation\ValidationException;

use App\Models\Service;
use FrittenKeeZ\Vouchers\Facades\Vouchers as Vocs;

class Vouchers extends Form
{
    #[Validate('required|numeric')]
    public $serviceItem;

    #[Validate('required|numeric')]
    public $qty;

    public function store(){
        $this->validate();
        if($this->qty >= 1 && $this->qty <= 10){
            $data_service = Service::find($this->serviceItem);
            Vocs::withMetadata([
                'credits' => intval($data_service->service_name)
            ]);
            $vouchers = Vocs::create($this->qty);
            $this->reset();
        }else{
            $this->reset();
            throw ValidationException::withMessages(['qty' => 'Quantity must be between 1 and 10.']);
        }
    }
}
