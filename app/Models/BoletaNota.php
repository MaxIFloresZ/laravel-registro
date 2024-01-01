<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletaNota extends Model
{
    use HasFactory;
    
    protected $table = 'boleta_notas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Nota_1',
        'Nota_2',
        'Nota_3',
        'notapromedio',
        'ano_estudio',
        'id_Curso',
        'id_estudiante'
    ];

    
}
