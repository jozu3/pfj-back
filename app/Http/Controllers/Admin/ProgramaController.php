<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pfj;
use App\Models\Programa;

class ProgramaController extends Controller
{
    public function __construct(){
        $this->middleware('can:admin.programas.index')->only('index');
        $this->middleware('can:admin.asistencias.create')->only('show');
        $this->middleware('can:admin.personale_notas.create')->only('show');
        $this->middleware('can:admin.programas.create')->only('create', 'store');
        $this->middleware('can:admin.programas.edit')->only('edit', 'update');
        $this->middleware('can:admin.programas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programas = Programa::all();
        
        return view('admin.programas.index', compact('programas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
    
        $pfj = Pfj::find($_GET['idcurso']);

        return view('admin.programas.create', compact('pfj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'pfj_id' => 'required',
            'nombre' => ['required'],
            'fecha_inicio' => ['required', 'date'],
            'fecha_fin' => ['required', 'date'],
            'estado' => ['required', 'numeric'],
        ]);

        $programa = Programa::create($request->all());

        $pfj = Pfj::find($request->pfj_id);
        //echo $request->id;  

        return redirect()->route('admin.pfjs.edit', compact('pfj'))->with('info', 'Programa creado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Programa $programa)
    {
        return view('admin.programas.show', compact('programa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Programa $programa)
    {
        $pfj = $programa->pfj;
        return view('admin.programas.edit', compact('programa', 'pfj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Programa $programa)
    {
        $request->validate([
            'pfj_id' => 'required',
            'inscripcione' => ['required', 'numeric'],
            'inscripcione2' => ['required', 'numeric'],
            'ncuotas' => ['required', 'numeric'],
            'cuota' => ['required', 'numeric'],
            'cuota2' => ['required', 'numeric'],
            'certificacion' => ['required', 'numeric'],
            'certificacion2' => ['required', 'numeric'],
            'fecha' => ['required', 'date'],
            'estado' => ['required', 'numeric'],
        ]);

        $programa->update($request->all());

        return redirect()->route('admin.programas.edit', compact('programa'))->with('info', 'Se actualizaron los datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Programa $programa)
    {
        $programa->delete();

        return redirect()->route('admin.pfjs.edit', $programa->pfj)->with('info', 'El programa se eliminó con éxito'); 
    }
}
