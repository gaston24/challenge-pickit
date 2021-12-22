<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;
    
    protected $table = 'transactions';

    protected $fillable = [
        'coche_id',
        'costo_total',
    ];
}
