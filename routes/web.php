<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes(['verify'=> true]);

Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');
Route::group(['middleware'=>'auth'], function(){
  Route::group(['middleware'=>'verified'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', [App\Http\Controllers\examenController::class, 'principal'])->name('principal');
    Route::get('/examenes', [App\Http\Controllers\examenController::class, 'examenes'])->name('examenes');

    Route::get('/examen/{examen}', [App\Http\Controllers\examenController::class, 'examen']);

    Route::get('/oneExamen', [App\Http\Controllers\examenController::class, 'oneExamen'])->name('oneExamen');
    Route::get('/falsoverdadero', [App\Http\Controllers\examenController::class, 'falsoverdadero'])->name('falsoverdadero');
    Route::get('/multiple', [App\Http\Controllers\examenController::class, 'multiple'])->name('multiple');
    Route::get('/texto', [App\Http\Controllers\examenController::class, 'texto'])->name('texto');
  });
  Route::post('/preguntas', [App\Http\Controllers\examenController::class, 'preguntas'])->name('preguntas');
  Route::post('/saveExamen', [App\Http\Controllers\examenController::class, 'saveExamen'])->name('saveExamen');
  Route::post('/saveQuestFV', [App\Http\Controllers\examenController::class, 'saveQuestFV'])->name('saveQuestFV');
  Route::post('/saveQuestMO', [App\Http\Controllers\examenController::class, 'saveQuestMO'])->name('saveQuestMO');
  Route::post('/saveQuestTL', [App\Http\Controllers\examenController::class, 'saveQuestTL'])->name('saveQuestTL');
  Route::post('/deleteQuest', [App\Http\Controllers\examenController::class, 'deleteQuest'])->name('deleteQuest');
});
