<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;


class Users extends Component
{

    public function bannedUser($id) {
        $user = User::find($id);

        if ($user->isBanned()) {
            $user->unban();
            $this->dispatch('Notifier',
                title: 'Success!',
                text: 'Berhasil Mengubannned Users!.',
                icon: 'success',
            );
        } else {
            $user->ban(); // Memban pengguna
            $this->dispatch('Notifier',
                title: 'Success!',
                text: 'Berhasil Membanned Users!.',
                icon: 'success',
            );
        }
    }

    public function render()
    {
        $user = User::paginate(10);
        return view('livewire.admin.users',
        [
            'users' => $user   
        ])->layout('layouts.app');
    }
}
