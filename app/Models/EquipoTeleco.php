<?php

namespace App\Models;

use Dotenv\Store\StoreBuilder;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Session\Store as SessionStore;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\StorageAttributes;
use Livewire\WithFileUploads;

class EquipoTeleco extends Model
{ 
  use WithFileUploads;
   protected $guarded=[];
   use HasFactory;
   public function CategoriaTeleco(){
   
     return $this->belongsTo(CategoriaTeleco::class);

   }


   public function imagenUrl(){

    return Storage::url($this->imagen);
   }

}
