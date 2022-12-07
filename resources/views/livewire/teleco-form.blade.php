<div>

     <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
               {{ __('crear') }}
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

                         {{ __('Registra Nuevos Equipos De Telecomunicacion') }}
                         </h2>
                    </x-slot>


                         <x-slot name="form">
                           <div class="col-span-6 sm:col-span-4">
                         <x-jet-label for="nombre" :value="__('Nombre del Equipo')" />
                          
                         <x-jet-input wire:model="equipoTeleco.nombre" class="mt-1 block w-full" id="nombre" type="text" />
                         <x-jet-input-error for="equipoTeleco.nombre" class="mt-2"/>
                         
                          </div>
                          
                          <div class="col-span-6 sm:col-span-4">
                         <x-jet-label for="marca" :value="__('Marca del Equipo')" />
                          
                         <x-jet-input wire:model="equipoTeleco.marca" class="mt-1 block w-full" id="marca" type="text" />
                         <x-jet-input-error for="equipoTeleco.marca" class="mt-2"/>
                         
                          </div>

                          <div class="col-span-6 sm:col-span-4">

                              
                         <x-jet-label for="categoriaT_id" :value="__('categoria')" />
                          <div class="flex space-x-1 mt-1">
                         <x-select wire:model="equipoTeleco.categoriaT_id" :options="$CategoriaTeleco" class=" block w-full" id="categoriaT_id" placeholder="Seleciona una Categoria"  />
                         <x-jet-secondary-button wire:click="open_categiraT">+</x-jet-secondary-button>
                         </div>
                         <x-jet-input-error for="equipoTeleco.categoriaT_id" class="mt-2"/>
                       
                          </div>

                          <div class="col-span-6 sm:col-span-4">
                         <x-jet-label for="modelo" :value="__('Modelo del Equipo')" />
                          
                         <x-jet-input wire:model="equipoTeleco.modelo" class="mt-1 block w-full" id="modelo" type="text" />
                         <x-jet-input-error for="equipoTeleco.modelo" class="mt-2"/>
                         
                          </div>

                          <div class="col-span-6 sm:col-span-4">
                         <x-jet-label for="detalles" :value="__('detalles del modelo')" />
                          
                         <x-textarea wire:model="equipoTeleco.detalles" class="mt-1 block w-full" id="detalles" type="text" />
                         <x-jet-input-error for="equipoTeleco.detalles" class="mt-2"/>
                         
                          </div>

                          <div class="col-span-6 sm:col-span-4 relative">
                            @if($imagen)  
                            <x-jet-danger-button wire:click="$set('imagen')" class="absolute bottom-2 right-2 ">{{__('Cambiar Imagen')}}</x-jet-danger-button>
                              <img src="{{$imagen->temporaryUrl()}}"  class="border-2 rouded" alt="">
                            @elseif($equipoTeleco->imagen)
                            <x-jet-label for="imagen" :value="__('cambiar imagen del equipo')" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" />
                            <img src="{{Storage::disk('public')->url($equipoTeleco->imagen)}}"  class="border-2 rouded" alt="">

                            @else
                             
                          <div class="h-20 bg-gray-50 border-2 border-dashed rounded flex items-center  justify-center ">
                          <x-jet-label for="imagen" :value="__('Imagen del equipo')" class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" />
                          
                         </div>

                         @endif
                         <x-jet-input wire:model="imagen" class="hidden" id="imagen" type="file" />
                         <x-jet-input-error for="imagen" class="mt-2"/>
                         
                          </div> 
                          
                         <x-slot name="actions">
                              @if($this->equipoTeleco->exists)
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
     @if($this->equipoTeleco->exists)
     <x-jet-confirmation-modal wire:model="deleteE">
     
     <x-slot name="title"> ¿Estas Seguro que quieres realizar este movimiento?</x-slot>
     
     <x-slot name="content">Realmente quieres eliminar el  Equipo: {{$this->equipoTeleco->nombre}}  </x-slot>   
     
     <x-slot name="footer"> 
      
          <x-jet-button wire:click="$set('deleteE', false)"> {{__('Cancelar')}}</x-jet-button>
           <x-jet-danger-button  wire:click="delete">{{__('Confirmar')}}</x-jet-danger-button>  
     </x-slot>

</x-jet-confirmation-modal>
          
  @endif
  
     <x-jet-modal wire:model="modalCT">
       <form wire:submit.prevent="saveCategoriaT">
          
          <div class="px-6 py-4">
               <div class="text-lg">
                 {{__('Nueva Categoria')}}
               </div>
       
               <div class="mt-4">
                    <div class="col-span-6 sm:col-span-4">
                         <x-jet-label for="nombre-categoriat" :value="__('categoria que pertenece el Equipo')" />
                          
                         <x-jet-input wire:model="newCategoriaT.nombre" class="mt-1 block w-full" id="nombre-categoriat" type="text" />
                         <x-jet-input-error for="newCategoriaT.nombre" class="mt-2"/>
                         
                          </div>
               </div>
           </div>
       
           <div class="flex flex-row justify-end px-6 py-4 bg-gray-100 text-right space-x-2">
              
               
               <x-jet-secondary-button wire:click="close_categiraT">Cancelar</x-jet-secondary-button>
               <x-jet-button>{{__('Guardar')}}</x-jet-button>
          </div>
       
      </form>
     </x-jet-modal>
</div>