<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    use HasFactory;

    protected $table = 'profesores';
    protected $primaryKey='id'; 

    protected $fillable =[
        'nombre',
        'apellido',
        'dni',
        'telefono',
        'estudios'
    ];
}
