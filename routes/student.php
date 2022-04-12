<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\ProgramaController;
use App\Http\Controllers\Student\GrupoController;
use App\Http\Controllers\Student\PagoController;
use App\Http\Controllers\Student\PersonaleUnidadeController;

Route::resource('', HomeController::class)->names('st');
Route::resource('programas', ProgramaController::class)->names('st.programas');
Route::resource('grupos', GrupoController::class)->names('st.grupos');