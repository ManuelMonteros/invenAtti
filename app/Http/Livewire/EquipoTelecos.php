<?php

namespace App\Http\Livewire;

use App\Models\EquipoTeleco;
use Livewire\Component;

class EquipoTelecos extends Component
{
    public $search='';
   
    public function render()
    {
        return view('livewire.equipo-telecos',[ 'EquipoTelecos'=>EquipoTeleco::where('nombre', 'like',"%{$this->search}%")->get()]);
    }
}
