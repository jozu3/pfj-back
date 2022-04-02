<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\HomeController;
use App\Http\Controllers\Student\GrupoController;
use App\Http\Controllers\Student\ObligacioneController;
use App\Http\Controllers\Student\PagoController;
use App\Http\Controllers\Student\PersonaleUnidadeController;

Route::resource('', HomeController::class)->names('st');
Route::resource('grupos', GrupoController::class)->names('st.grupos');
Route::resource('obligaciones', ObligacioneController::class)->names('st.obligaciones');
Route::resource('pagos', PagoController::class)->names('st.pagos');
Route::resource('personale_unidade', PagoController::class)->names('st.personale_unidade');