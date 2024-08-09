<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;


class Transaksi extends Component
{
    use WithPagination;
    
    public function render()
    {
        $pending = Transaction::where('status', 0)->orderBy('created_at', 'desc')->paginate(10);
        $success = Transaction::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        $failed = Transaction::where('status', -1)->orderBy('created_at', 'desc')->paginate(10);


        return view('livewire.admin.transaksi',[
            'pending' => $pending,
            'success' => $success,
            'failed' => $failed,
        ])->layout('layouts.app');
    }
}
