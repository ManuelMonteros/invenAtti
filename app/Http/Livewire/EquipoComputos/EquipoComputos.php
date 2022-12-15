<?php

namespace App\Http\Livewire\EquipoComputos;
use App\Models\Computo\EquipoComputo;  
use Livewire\Component;

class EquipoComputos extends Component
{    public $search;
    public function render()
    {    
        return view('livewire.equipo-computo.equipo-computos',[ 'EquipoComputo'=>EquipoComputo::where('marca', 'like',"%{$this->search}%")->get()]);
    }
}
