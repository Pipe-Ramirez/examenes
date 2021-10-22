<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\examenController::class, 'principal'])->name('principal');
Route::get('/examenes', [App\Http\Controllers\examenController::class, 'examenes'])->name('examenes');

Route::get('/nuevo_examen', [App\Http\Controllers\examenController::class, 'nuevoExamen'])->name('nuevo_examen');
Route::get('/preguntas/{id}', [App\Http\Controllers\examenController::class, 'preguntas'])->name('preguntas');
Route::get('/oneExamen', [App\Http\Controllers\examenController::class, 'oneExamen'])->name('oneExamen');
Route::get('/falsoverdadero', [App\Http\Controllers\examenController::class, 'falsoverdadero'])->name('falsoverdadero');
Route::get('/multiple', [App\Http\Controllers\examenController::class, 'multiple'])->name('multiple');
Route::get('/texto', [App\Http\Controllers\examenController::class, 'texto'])->name('texto');


Route::post('/saveExamen', [App\Http\Controllers\examenController::class, 'saveExamen'])->name('saveExamen');
Route::post('/saveQuestFV', [App\Http\Controllers\examenController::class, 'saveQuestFV'])->name('saveQuestFV');
Route::post('/saveQuestMO', [App\Http\Controllers\examenController::class, 'saveQuestMO'])->name('saveQuestMO');
Route::post('/saveQuestTL', [App\Http\Controllers\examenController::class, 'saveQuestTL'])->name('saveQuestTL');
