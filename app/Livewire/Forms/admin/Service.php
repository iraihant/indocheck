<?php

namespace App\Livewire\Forms\admin;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Service as ServiceModel;


class Service extends Form
{
    #[Validate('required|numeric')]
    public $serviceItem;

    #[Validate('required|numeric')]
    public $price;


    public function store(){
        $this->validate();
        $serv = new ServiceModel();
        $serv->service_name = $this->serviceItem;
        $serv->price = $this->price;
        $serv->status = false;
        $serv->save();
        $this->reset();
    }

}
