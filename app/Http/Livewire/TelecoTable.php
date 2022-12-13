<?php

namespace App\Http\Livewire;

use App\Models\EquipoTeleco;
use App\Models\GestionTeleco;
use Livewire\Component;
use Livewire\WithPagination;

class TelecoTable extends Component
{   
    public $search='';
    use WithPagination;
    
    public function render()
    {
       
        return view('livewire.teleco-table',[ 'GestionTeleco'=>GestionTeleco::where('equipo_id', 'like',"%{$this->search}%")->get()]);;
    }
}
