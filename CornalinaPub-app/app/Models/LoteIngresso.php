<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteIngresso extends Model
{
    use HasFactory;
    protected $table="lote";
    protected $fillable = ['evento_id', 'descricao'];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id', 'id');
    }

    public function ingressos()
    {
        return $this->hasMany(Ingresso::class, 'lote_ingresso_id', 'id');
    }
}
