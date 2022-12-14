<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoriaTeleco;
use App\Models\EquipoTeleco;
use App\Models\GestionTeleco;

use Illuminate\Validation\Rule as ValidationRule;

class GestionTelecos extends Component
{
    public $selectCategoria=null,$equipo_id=null;
    public $equipoTeleco=null;
   public $newCategoriaT;
   public GestionTeleco $gestionTeleco;
    
   
   protected function rules(){ return
       
        [ 
    
        
     'gestionTeleco.serial' =>['required','min:2','unique:gestion_telecos,serial'],
     'gestionTeleco.status'=>['required','min:2'],
     'gestionTeleco.ubicacion' =>['required','min:2'],
     'gestionTeleco.observacion' =>['required','min:2,max:200'],
     'gestionTeleco.actualizacion' =>['required','min:2,max:200'],
     'gestionTeleco.equipo_id' =>['required'],
     'newCategoriaT.nombre'=>[ValidationRule::requiredIf($this->newCategoriaT instanceof CategoriaTeleco),'unique:categoria_telecos,nombre' ]
    
    ];
}
     

public function mount(GestionTeleco $gestionTeleco){
        
    $this->gestionTeleco= $gestionTeleco;


} 
public function updated($propertyName){

     
       
    $this->validateOnly($propertyName);

 }
 
 public function save(){
        

    $this->validate();
   
    $this->gestionTeleco->save();
       
    session()->flash('status','El Equipo se guardo con existo');

    // $this->redirectRoute('GestionT.index');


}

    public function render()
    {
        return view('livewire.gestion-telecos', ['categoriaT'=> CategoriaTeleco::all()]);
    }
    
    public function updatedselectCategoria($categoriaT_id){
  
        $this->equipoTeleco=EquipoTeleco::where('categoriaT_id', $categoriaT_id)->get();
  
    }

}
