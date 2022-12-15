<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;



use App\Models\CategoriaTeleco;




class EquipoTeleco extends Model
{ 

   protected $guarded=[];
   use HasFactory;
   protected $fillable=['nombre','marca','modelo','imagen','detalles'];
   public function CategoriaTeleco(){
   
     return $this->belongsTo(CategoriaTeleco::class);

   }


   public function imagenUrl(){

    return Storage::disk('public')->url($this->imagen); 
  }

}
