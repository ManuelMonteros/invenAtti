<?php

namespace App\Http\Livewire\EquipoComputos;

use App\Models\Computo\CategoriaComputo;
use App\Models\Computo\EquipoComputo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ComputoForm extends Component
{
          
        use WithFileUploads;
        public EquipoComputo $equipoComuto;
         public $imagen;
         
         public $modalCT=false;
         public $newCategoriaC;
         public $deleteC=false;
        
   
         protected function rules(){ return
          
           [ 
       
           'imagen' =>[Rule::requiredIf(!$this->equipoComputo->imagen), Rule::when($this->imagen, ['image','max:2048'])],
        'equipoComputo.nombre' =>['required','min:2'],
        'equipoComputo.marca'=>['required','min:2'],
        'equipoComputo.modelo' =>['required','min:2'],
        'equipoComputo.detalles' =>['required','min:2,max:200'],
        'equipoComputo.categoriaT_id' =>['required'],
        'newCategoriaC.nombre'=>[Rule::requiredIf($this->newCategoriaC instanceof CategoriaComputo),'unique:categoria_computos,nombre' ]
       
       ];
   }
     
      
         public function mount(EquipoComputo $equipoComputo){
           
             $this->equipoComputo= $equipoComputo;
   
   
         } 
   
         public function open_categiraC(){
   
           $this->newCategoriaC= new CategoriaComputo();
           $this->modalCT=true;
          }
    
          
          public function close_categiraC(){
            $this->modalCT=false;
            $this->newCategoriaC= null;
            $this->clearValidation();         
           }
    
      
         public function saveCategoriaC(){
   
           $this->validateOnly('newCategoriaT.nombre');
           $this->newCategoriaT->save();
           $this->equipoComputo->categoriaC_id= $this->newCategoriaC->id;
           $this->close_categiraT();
   
         }
   
   
   
      public function updated($propertyName){
   
        
          
         $this->validateOnly($propertyName);
   
      }
      
       
   
       public function save(){
           
   
          $this->validate();
           if($this->imagen){
             if($oldimagen=$this->equipoComputo->imagen)
          {
           Storage::disk('public')->delete($oldimagen);
          }
           
          $this->equipoComputo->imagen= $this->imagen->Store('/uploads','public');
          
         $this->equipoComputo->save();
          
          session()->flash('status','El Equipo se guardo con existo');
   
           $this->redirectRoute('EquipoC.index');
       }
     }
   
       public function delete(){
         Storage::disk('public')->delete($this->equipoComputo->imagen);
       
         $this->equipoTeleco->delete();
         session()->flash('status','El Equipo se Elimidado con existo');
         $this->redirect(route('EquipoT.index'));
       }
       public function render()
    { 
   
        return view('livewire.equipo-computo.computo-form',['CategoriaComputo'=>CategoriaComputo::pluck('nombre','id')]);
    }
}
