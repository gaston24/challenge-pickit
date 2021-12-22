<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'apellido',
        'nombre',
    ];

    public function cars()
    {
        return $this->hasMany('App\Car');
    }
}
