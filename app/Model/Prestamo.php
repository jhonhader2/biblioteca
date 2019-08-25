<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
}
