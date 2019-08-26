<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [];

    public function autor(){
        return $this->belongsTo(Autor::class);
    }
    
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }
}
