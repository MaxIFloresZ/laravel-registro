<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'descripcion',
        'aforo',
        'fechaInicio',
        'fechaFin',
        'id_profe '
    ];
}
