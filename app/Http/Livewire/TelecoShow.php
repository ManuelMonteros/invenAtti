<?php

namespace App\Http\Livewire;

use App\Models\EquipoTeleco;
use Livewire\Component;

class TelecoShow extends Component
{     public EquipoTeleco $EquipoTeleco;
    public function render()
    {
        return view('livewire.teleco-show');
    }
}
