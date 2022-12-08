<div class="relative">
    
    @php($id=$attributes->wire('model')->value)
    @if ($imagen instanceof Livewire\temporaryUploadedFile)
    <x-jet-danger-button wire:click="$set('{{$id}}')" class="absolute bottom-2 right-2 ">{{ __('Cambiar Imagen') }}
    </x-jet-danger-button>
    <img src="{{ $imagen->temporaryUrl() }}" class="border-2 rouded" alt="">
@elseif($existing)
    <x-jet-label for="{{$id}}" :value="__('cambiar imagen del equipo')"
        class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" />
    <img src="{{ Storage::disk('public')->url(!$existing) }}" class="border-2 rouded" alt="">
@else
    <div class="h-20 bg-gray-50 border-2 border-dashed rounded flex items-center  justify-center ">
        <x-jet-label for="{{$id}}" :value="__('Seleciona la Imagen del equipo')"
            class="cursor-pointer inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition" />

    </div>
@endif
<x-jet-input wire:model="{{$id}}" class="hidden" id="{{$id}}" type="file" />
</div>
