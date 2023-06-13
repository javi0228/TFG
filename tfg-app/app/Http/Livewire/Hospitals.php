<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Hospital as HospitalModel;

class Hospitals extends Component
{
    public $hospitals=[];

    public function mount()
    {
        // Recojo todos los hospitales
        $this->hospitals = HospitalModel::all();
    }
    public function render()
    {
        return view('livewire.hospitals');
    }
}
