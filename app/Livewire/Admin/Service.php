<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Service as ServiceModel;
use App\Livewire\Forms\admin\Service as ServiceForm;

class Service extends Component
{
    use WithPagination;

    public ServiceForm $form;

    public function save(){
        try{
            $this->form->store();
            $this->dispatch('Notifier',
                    title: 'Success!',
                    text: 'Berhasil Menambahkan Service!, Aktifkan Service untuk dapat digunakan!',
                    icon: 'success',
                );
        }catch(\Exception $e){
            $this->dispatch('Notifier',
            title: 'Error!',
            text: $e->validator->errors()->all(),
            icon: 'error',);
        }
    }

    public function ChangeService($data){
        $ser = ServiceModel::find($data);
        if($ser->status == true){
            $ser->status = false;
            $ser->save();
            $this->dispatch('Notifier',
                    title: 'Success!',
                    text: 'Berhasil Menonaktifkan Service!, Service Tidak akan bisa digunakan!',
                    icon: 'success',
                );
        }else{
            $ser->status = true;
            $ser->save();
            $this->dispatch('Notifier',
                title: 'Success!',
                text: 'Berhasil Mengaktifkan Service!, Service dapat digunakan!',
                icon: 'success',
            );
        }
    }

    public function delete($data){
        ServiceModel::destroy($data);
        $this->dispatch('Notifier',
            title: 'Success!',
            text: 'Berhasil Menghapus Service!',
            icon: 'success',
        );
    }

    public function render()
    {
        $serviceData = ServiceModel::orderBy('service_name', 'asc')->paginate(10);
        return view('livewire.admin.service', [
            'service' => $serviceData
        ])->layout('layouts.app');;
    }
}
