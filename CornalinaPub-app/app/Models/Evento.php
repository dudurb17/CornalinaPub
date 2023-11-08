<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
 protected $table="eventos";
    protected $fillable = [
        'nome',
        'data',
        'genero',
        'horario',
        'numero_de_ingressos',
        'endereco',
        ];
    protected $casts = [
    'data'=> 'date',
    'horario'=>'time',
    'numero_de_ingressos'=>'integer'
    ];
}
