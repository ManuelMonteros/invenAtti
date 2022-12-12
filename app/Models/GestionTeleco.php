<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GestionTeleco extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function CategoriaTeleco(){
   
        return $this->belongsTo(CategoriaTeleco::class);
   
      }
   
}
