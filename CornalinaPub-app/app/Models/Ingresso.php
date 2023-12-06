<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingresso extends Model
{
    use HasFactory;
    protected $table="ingresso";
    protected $fillable = ['lote_ingresso_id', 'codigo','valor'];

    public function loteIngresso()
    {
        return $this->belongsTo(LoteIngresso::class, 'lote_ingresso_id', 'id');
    }
}
