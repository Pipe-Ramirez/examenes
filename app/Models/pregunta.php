<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id';

    protected $table='preguntas';

    protected $fillable = [
      'id','id_examen','id_tipo','puntaje','pregunta'
    ];
}
