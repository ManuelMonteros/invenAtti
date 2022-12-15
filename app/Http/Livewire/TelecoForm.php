<?php

namespace App\Http\Livewire;
use Illuminate\Validation\Rule;
use App\Models\CategoriaTeleco;
use App\Models\EquipoTeleco;

use Livewire\Component;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Storage;

class TelecoForm extends Component
{   
     use WithFileUploads;
     public EquipoTeleco $equipoTeleco;
      public $imagen;
      
      public $modalCT=false;
      public $newCategoriaT;
      public $deleteE=false;
     

      protected function rules(){ return
       
        [ 
    
        'imagen' =>[Rule::requiredIf(!$this->equipoTeleco->imagen), Rule::when($this->imagen, ['image','max:2048'])],
     'equipoTeleco.nombre' =>['required','min:2'],
     'equipoTeleco.marca'=>['required','min:2'],
     'equipoTeleco.modelo' =>['required','min:2'],
     'equipoTeleco.detalles' =>['required','min:2,max:200'],
     'equipoTeleco.categoriaT_id' =>['required'],
     'newCategoriaT.nombre'=>[Rule::requiredIf($this->newCategoriaT instanceof CategoriaTeleco),'unique:categoria_telecos,nombre' ]
    
    ];
}
  
   
      public function mount(EquipoTeleco $equipoTeleco){
        
          $this->equipoTeleco= $equipoTeleco;


      } 

      public function open_categiraT(){

        $this->newCategoriaT= new CategoriaTeleco;
        $this->modalCT=true;
       }
 
       
       public function close_categiraT(){
         $this->modalCT=false;
         $this->newCategoriaT= null;
         $this->clearValidation();         
        }
 
   
      public function saveCategoriaT(){

        $this->validateOnly('newCategoriaT.nombre');
        $this->newCategoriaT->save();
        $this->equipoTeleco->categoriaT_id= $this->newCategoriaT->id;
        $this->close_categiraT();

      }



   public function updated($propertyName){

     
       
      $this->validateOnly($propertyName);

   }
   
    

    public function save(){
        

       $this->validate();
        if($this->imagen){
          if($oldimagen=$this->equipoTeleco->imagen)
       {
        Storage::disk('public')->delete($oldimagen);
       }
        
       $this->equipoTeleco->imagen= 'storage/'.$this->imagen->store('Teleco','public');
       
      $this->equipoTeleco->save();
       
       session()->flash('status','El Equipo se guardo con existo');

        $this->redirectRoute('EquipoT.index');
    }
  }

    public function delete(){
      Storage::disk('public')->delete($this->equipoTeleco->imagen);
    
      $this->equipoTeleco->delete();
      session()->flash('status','El Equipo se Elimidado con existo');
      $this->redirect(route('EquipoT.index'));
    }




    public function render()
    {
        return view('livewire.teleco-form',['CategoriaTeleco'=>CategoriaTeleco::pluck('nombre','id')]);
    }
}
