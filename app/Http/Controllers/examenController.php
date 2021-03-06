<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\examen;
use App\Models\opciones;
use App\Models\pregunta;
use App\Models\tipo_pregunta;

class examenController extends Controller
{
  public function examenes()
  {
    $examenes = examen::all();
    return $examenes;
  }
  public function principal()
  {
    return view('principal');
  }
  public function examen($id)
  {
      // $idExamen = Crypt::decrypt($id);
      $examen = examen::where('id',$id)->get();
      return view('preguntas',[
        'examen' => $examen,
      ]);
  }
  public function deleteQuest(Request $request)
  {
    $preguntas = pregunta::where('id',$request->id)->delete();
    $opciones = opciones::where('id_quest',$request->id)->delete();
  }

  public function preguntas(Request $request)
  {
    $preguntas = pregunta::where('id_examen',$request->id)->get();
    return  $preguntas;
  }
  public function falsoverdadero()
  {
    return view('preguntas/falsoverdadero');
  }
  public function multiple()
  {
    return view('preguntas/multiple');
  }
  public function texto()
  {
    return view('preguntas/texto');
  }
  //--------------------------------------------
  public function saveExamen(Request $request)
  {
    $save = new examen();
    $save->titulo = $request->Etitulo;
    $save->descripcion = $request->Edescrip;
    $save->tiempo = $request->Etiempo;
    $save->intentos = $request->Eintentos;
    $save->save();
    return $save;
  }

  public function saveQuestFV(Request $request)
  {
    $save = new pregunta();
    $save->id_examen = $request->idEx;
    $save->tipo = "Falso / Verdadero";
    $save->puntaje = $request->puntaje;
    $save->pregunta = $request->descrip;
    // $save->save();

    $saveO = new opciones();
    $saveO->id_quest = $save->id;
    $saveO->fv = $request->fv;
    $saveO->opc1 = null;
    $saveO->opc2 = null;
    $saveO->opc3 = null;
    $saveO->opc4 = null;
    $saveO->selec = null;
    // $saveO->save();

    return $save;

  }
  public function saveQuestMO(Request $request)
  {
    $save = new pregunta();
    $save->id_examen = $request->idEx;
    $save->tipo = "Opci??n m??ltiple";
    $save->puntaje = $request->puntaje;
    $save->pregunta = $request->descrip;
    $save->save();

    $saveO = new opciones();
    $saveO->id_quest = $save->id;
    $saveO->fv = null;
    $saveO->opc1 = $request->opc1;
    $saveO->opc2 = $request->opc2;
    $saveO->opc3 = $request->opc3;
    $saveO->opc4 = $request->opc4;
    $saveO->selec = $request->selec;
    $saveO->save();

    return $save;
  }
  public function saveQuestTL(Request $request)
  {
    $save = new pregunta();
    $save->id_examen = $request->idEx;
    $save->tipo = "Texto libre";
    $save->puntaje = $request->puntaje;
    $save->pregunta = $request->descrip;
    $save->save();

    return $save;
  }
}
