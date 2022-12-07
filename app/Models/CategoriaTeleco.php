<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaTeleco extends Model
{
    use HasFactory;
    
    protected $guarded=[];
    protected $fillable = ['nombre'];

    public function materiales()
    {
        return $this->hasMany(EquipoTeleco::class);
    }
    
}
