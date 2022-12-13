<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaTeleco;
use App\Models\EquipoTeleco;

class GestionTeleco extends Model
{   
  protected $fillable = ['equipo_id','serial','observacion','actualizacion','ubicacion'];
    use HasFactory;
    protected $guarded=[];
   
   
      public function categorias()
      {
          return $this->hasOne('App\Models\EquipoTeleco', 'id', 'equipo_id');
      }
}
