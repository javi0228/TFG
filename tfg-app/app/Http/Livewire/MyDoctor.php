<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class MyDoctor extends Component
{
    public $doctor;

    public function mount()
    {
        $this->doctor=Auth::user()->doctor;
    }
    public function render()
    {
        return view('livewire.my-doctor');
    }
}