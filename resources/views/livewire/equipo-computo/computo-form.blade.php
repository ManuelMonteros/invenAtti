<div>

    <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Crear nuevo Equipo Computo') }}
         </h2>
    </x-slot>

    <div>
         <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

              <x-jet-form-section submit="save">
                   <x-slot name="title">

                        {{ __('Nuevo Equipo') }}
                        </h2>
                   </x-slot>


                   <x-slot name="description">

                        {{ __('Registra Nuevos Equipos De Infraestructura tecnologica') }}
                        </h2>
                   </x-slot>


                        <x-slot name="form">
                          <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="nombre" :value="__('Nombre del Equipo')" />
                         
                        <x-jet-input wire:model="equipoComputo.nombre" class="mt-1 block w-full" id="nombre" type="text" />
                        <x-jet-input-error for="equipoComputo.nombre" class="mt-2"/>
                        
                         </div>
                         
                         <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="marca" :value="__('Marca del Equipo')" />
                         
                        <x-jet-input wire:model="equipoComputo.marca" class="mt-1 block w-full" id="marca" type="text" />
                        <x-jet-input-error for="equipoComputo.marca" class="mt-2"/>
                        
                         </div>

                         <div class="col-span-6 sm:col-span-4">

                             
                        <x-jet-label for="categoriaC_id" :value="__('tipo de Equipo')" />
                         <div class="flex space-x-1 mt-1">
                        <x-select wire:model="equipoComputo.categoriaC_id" :options="$CategoriaComputo" class=" block w-full" id="categoriaC_id" placeholder="Seleciona una Categoria"  />
                        <x-jet-secondary-button wire:click="open_categiraC">+</x-jet-secondary-button>
                        </div>
                        <x-jet-input-error for="equipoTeleco.categoriaC_id" class="mt-2"/>
                      
                         </div>

                         <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="modelo" :value="__('Modelo del Equipo')" />
                         
                        <x-jet-input wire:model="equipoComputo.modelo" class="mt-1 block w-full" id="modelo" type="text" />
                        <x-jet-input-error for="equipoComputo.modelo" class="mt-2"/>
                        
                         </div>

                         <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="detalles" :value="__('detalles del modelo')" />
                         
                        <x-textarea wire:model="equipoComputo.detalles" class="mt-1 block w-full" id="detalles" type="text" />
                        <x-jet-input-error for="equipoComputo.detalles" class="mt-2"/>
                        
                         </div>

                         <div class="col-span-6 sm:col-span-4 ">
                           
                             <x-select-imagen wire:model="imagen" :imagen="$imagen" existing="$equipoTeleco->imagen"/>
                           
                        <x-jet-input-error for="imagen" class="mt-2"/>
                        
                         </div> 
                         
                        <x-slot name="actions">
                             @if($this->equipoCompunto->exists)
                          <x-jet-danger-button wire:click="$set('deleteE', true)" class="mr-auto">
                             {{__('Eliminar')}}     
                        </x-jet-danger-button>   
                        @endif
                         <x-jet-button>
                             {{__('Guardar')}}
                         </x-jet-button>
                        
                        </x-slot>
                   </x-slot>


              </x-jet-form-section>
         </div>
    </div>
    @if($this->equipoComputo->exists)
    <x-jet-confirmation-modal wire:model="deleteE">
    
    <x-slot name="title"> ¿Estas Seguro ?</x-slot>
    
    <x-slot name="content">Realmente quieres eliminar el  Equipo: {{$this->equipoCompunto->nombre}}  </x-slot>   
    
    <x-slot name="footer"> 
     
         <x-jet-button wire:click="$set('deleteE', false)"> {{__('Cancelar')}}</x-jet-button>
          <x-jet-danger-button  wire:click="delete">{{__('Confirmar')}}</x-jet-danger-button>  
    </x-slot>

</x-jet-confirmation-modal>
         
 @endif
 
    <x-jet-modal wire:model="modalCT">
      <form wire:submit.prevent="saveCategoriaC">
         
         <div class="px-6 py-4">
              <div class="text-lg">
                {{__('Nueva Categoria')}}
              </div>
      
              <div class="mt-4">
                   <div class="col-span-6 sm:col-span-4">
                        <x-jet-label for="nombre-categoriac" :value="__('categoria que pertenece el Equipo')" />
                         
                        <x-jet-input wire:model="newCategoriaC.nombre" class="mt-1 block w-full" id="nombre-categoriac" type="text" />
                        <x-jet-input-error for="newCategoriaC.nombre" class="mt-2"/>
                        
                         </div>
              </div>
          </div>
      
          <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right space-x-2">
             
              
              <x-jet-secondary-button wire:click="close_categiraC">Cancelar</x-jet-secondary-button>
              <x-jet-button>{{__('Guardar')}}</x-jet-button>
         </div>
      
     </form>
    </x-jet-modal>
</div>