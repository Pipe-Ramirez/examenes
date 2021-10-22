<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opciones extends Model
{
  use HasFactory;
  protected  $primaryKey = 'id';

  protected $table='opciones';

  protected $fillable = [
    'id','id_quest','fv','opc1','opc2','opc3','opc4','selec'
  ];
}
