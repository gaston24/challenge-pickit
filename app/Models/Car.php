<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'modelo',
        'anio',
        'patente',
        'color',
    ];

    // public function cars()
    // {
    //     return $this->hasMany('App\Car');
    // }
}
