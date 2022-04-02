<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\PersonalesExport;
use App\Models\Grupo;

class ExcelController extends Controller
{
    public function personalesGrupo(Grupo $grupo){
        $alumExport = new PersonalesExport();
        return $alumExport->forGroup($grupo->id)->download('personales.xlsx');
    }
}
