<?php

namespace App\Models\Computo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class EquipoComputo extends Model
{
    use HasFactory;
    public function imagenUrl(){
 
     return Storage::disk('public')->url($this->imagen); 
   }
 
}
