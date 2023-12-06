<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    protected $table="events";
    protected $fillable = ['nome', 'empresa_id', 'baner', "data","numero_de_ingressos", "endereco"];

    public function empresa(){
        return $this->belongsTo(Empresa::class,
            'empresa_id','id');
    }


}