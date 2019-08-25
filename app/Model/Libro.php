<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['nombre'];

    public function categoria()
    {
        return $this->belongsTo('App\Model\Categoria');
    }

    public function autor()
    {
        return $this->belongsTo('App\Model\Autor');
    }
}
