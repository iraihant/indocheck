<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Vouchers extends Component
{
    public function render()
    {
        return view('livewire.admin.vouchers')->layout('layouts.app');
    }
}
