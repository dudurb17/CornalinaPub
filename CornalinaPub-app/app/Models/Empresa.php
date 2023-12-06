<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table="empresas";
    protected $fillable = ['nome', 'cnpj', 'endereco', "logo"];
    public function eventos(){
        //relacionamento 1 - n
        return $this->hasMany(Evento::class);
    }
}