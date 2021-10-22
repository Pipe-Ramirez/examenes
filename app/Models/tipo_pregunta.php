<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_pregunta extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id';

    protected $table='tipo_preguntas';

    protected $fillable = [
      'id','nombre'
    ];
}
