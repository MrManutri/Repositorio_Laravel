<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decreto extends Model
{
    use HasFactory;

    protected $fillable = ['cod_decreto', 'numero',
     'fecha', 'materia', 'firmador',
     'interesado','nombre_archivo',
    'id_tipo_documento','id_cr','vistos',
    'id_restringido', 'creador','conciderando','anexo'];
}
