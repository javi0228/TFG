<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MedicalHistory extends Component
{

    public $medicalHistory;
    
    public function mount()
    {
        $this->medicalHistory=Auth::user()->medicalHistory;
    }
    public function render()
    {
        return view('livewire.medical-history');
    }
}
