<div>
     <x-slot name="header">
     
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{__('Gestion')}}</h2>
     </x-slot>
     
     <div>
     
        <div class="max-w-7xl mx-auto py-10 sm:px-6 sm:px-6 lg:px-8">
          <x-jet-form-section submit="save">
     
             <x-slot name="title"> 
           {{__('Nuevo registro')}}
          </x-slot>  
          <x-slot name="description"> 
               {{__('Nuevo registro')}}
              </x-slot>  
     
     
      <x-slot name="form"> 
     
    
          <div class="col-span-6 sm:col-span-4">
     
                
               <label for="">Categoria telecomunicacion</label>
               <select wire:model="selectCategoria">
                 <option value="">==Categorias==</option>
                 @foreach ($categoriaT as $key)
                 <option value="{{$key->id}}">{{$key->nombre}}</option>  
                 @endforeach
            </select>
     </div>
    
 @if(!is_null($equipoTeleco))
 <div class="col-span-6 sm:col-span-4">

       
      <label for="">Marca y modelo</label>
      <select wire:model="selectequipo">
        <option value="">==Marca y modelo==</option>
        @foreach ($equipoTeleco as $key)
        <option value="{{$key->id}}">{{$key->marca}}&nbsp;{{$key->modelo}}</option>  
        @endforeach
   </select>
</div>
@endif     

     
          <div class="col-span-6 sm:col-span-4">
               <x-jet-label for="serial" :value="__('Serial del Equipo')" />
                
               <x-jet-input wire:model="gestionTeleco.serial" class="mt-1 block w-full" id="serial" type="text" />
               <x-jet-input-error for="gestionTeleco.serial" class="mt-2"/>
               
                </div>
     
     
     
     
     
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="nombre" :value="__('Status del Equipo')" />
                     
                    <x-select1 wire:model="gestionTeleco.status" class="mt-1 block w-full" id="nombre" type="text" />
                    <x-jet-input-error for="gestionTeleco.status" class="mt-2"/>
                    
                     </div>
          
          
     
                          <div class="col-span-6 sm:col-span-4">
                              <x-jet-label for="nombre" :value="__('Ubicacion')" />
                               
                              <x-jet-input wire:model="gestionTeleco.ubicacion" class="mt-1 block w-full" id="nombre" type="text" />
                              <x-jet-input-error for="gestionTeleco.ubicacion" class="mt-2"/>
                              
                               </div>
                    
               
               
                               <div class="col-span-6 sm:col-span-4">
                                   <x-jet-label for="detalles" :value="__('Observacion')" />
                                    
                                   <x-textarea wire:model="gestionTeleco.observacion" class="mt-1 block w-full" id="detalles" type="text" />
                                   <x-jet-input-error for="gestionTeleco.observacion" class="mt-2"/>
                                   
                                    </div>
     
     
                      
                         
                    
                    
          
                                    <div class="col-span-6 sm:col-span-4">
                                        <x-jet-label for="nombre" :value="__('fecha de Actializacion')" />
                                         
                                        <x-jet-input wire:model="gestionTeleco.actualizacion" class="mt-1 block w-full" id="nombre" type="date" />
                                        <x-jet-input-error for="gestionTeleco.actualizacion" class="mt-2"/>
                                        
                                         </div>
                              
                         
          
     
     
     
     
     
     
     
              </x-slot>  
     
     
     
     
     
     
     
     </x-jet-form-section>
        </div>
     
     
     
     
     </div>

     
     
     
     <div>
             

                         
                            
                           
                           
            
                               
