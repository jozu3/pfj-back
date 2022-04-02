<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ContactoController;
use App\Http\Controllers\Admin\SeguimientoController;
use App\Http\Controllers\Admin\PersonaleController;
use App\Http\Controllers\Admin\PfjController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\Admin\NotaController;
use App\Http\Controllers\Admin\ProgramaController;
use App\Http\Controllers\Admin\ProfesoreController;
use App\Http\Controllers\Admin\InscripcioneController;
use App\Http\Controllers\Admin\ObligacioneController;
use App\Http\Controllers\Admin\PagoController;
use App\Http\Controllers\Admin\CuentaController;
use App\Http\Controllers\Admin\PDFController;
use App\Http\Controllers\Admin\ClaseController;
use App\Http\Controllers\Admin\PersonaleGrupoeController;
use App\Http\Controllers\Admin\PersonaleNotaController;
use App\Http\Controllers\Admin\ExcelController;

Route::resource('', HomeController::class)->names('admin');
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('personales', PersonaleController::class)->names('admin.personales');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('contactos', ContactoController::class)->names('admin.contactos');
Route::resource('seguimientos', SeguimientoController::class)->names('admin.seguimientos');
Route::resource('pfjs', PfjController::class)->names('admin.pfjs');
Route::resource('grupos', GrupoController::class)->names('admin.grupos');
Route::resource('notas', NotaController::class)->names('admin.notas');
Route::resource('programas', ProgramaController::class)->names('admin.programas');
Route::resource('inscripciones', InscripcioneController::class)->names('admin.inscripciones');
Route::resource('obligaciones', ObligacioneController::class)->names('admin.obligaciones');
Route::resource('pagos', PagoController::class)->names('admin.pagos');
Route::resource('cuentas', CuentaController::class)->names('admin.cuentas');
Route::resource('clases', ClaseController::class)->names('admin.clases');
Route::resource('personale_grupoes', PersonaleGrupoeController::class)->names('admin.personale_grupoes');
Route::resource('personale_notas', PersonaleNotaController::class)->names('admin.personale_notas');

Route::delete('personale_grupoes/destroyfromgroup/{grupo}', [PersonaleGrupoeController::class, 'destroyfromgroup'])->name('admin.personale_grupoes.destroyfromgroup');
Route::post('clases/updatefromgroup/{grupo}', [PersonaleGrupoeController::class, 'updatefromgroup'])->name('admin.personale_grupoes.updatefromgroup');

Route::delete('clases/destroyfromgroup/{grupo}', [ClaseController::class, 'destroyfromgroup'])->name('admin.clases.destroyfromgroup');
Route::post('clases/storeforgroup/{grupo}', [ClaseController::class, 'storeforgroup'])->name('admin.clases.storeforgroup');
  

  

//Route::resource('pdfs', PDFController::class)->names('pdfs');
Route::get('recibo-inscripcione/{idinscripcione}', [PDFController::class, 'reciboInscripcione'])->name('admin.print');
Route::get('reportpagos', [PDFController::class, 'pagos'])->name('admin.print.pagos');

/*Route::resource('grupos', GrupoController::class, ['except' => ['create']])->names('admin.grupos');
Route::get('grupos/create/{id}', [GrupoController::class, 'create'])->name('admin.grupos.create');
*/

Route::get('/report-personales-grupo/{grupo}', [ExcelController::class, 'personalesGrupo'])->name('admin.excel.personalesGrupo');
	