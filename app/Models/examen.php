<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examen extends Model
{
    use HasFactory;
    protected  $primaryKey = 'id';

    protected $table='examens';

    protected $fillable = [
      'id','titulo','descripcion','tiempo','intentos'
    ];
}
