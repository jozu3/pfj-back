<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inscripcione;
use App\Models\InscripcioneCompanerismo;
use Illuminate\Http\Request;

class InscripcioneCompanerismoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InscripcioneCompanerismo  $inscripcioneCompanerismo
     * @return \Illuminate\Http\Response
     */
    public function show(InscripcioneCompanerismo $inscripcioneCompanerismo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InscripcioneCompanerismo  $inscripcioneCompanerismo
     * @return \Illuminate\Http\Response
     */
    public function edit(InscripcioneCompanerismo $inscripcioneCompanerismo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InscripcioneCompanerismo  $inscripcioneCompanerismo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InscripcioneCompanerismo $inscripcioneCompanerismo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InscripcioneCompanerismo  $inscripcioneCompanerismo
     * @return \Illuminate\Http\Response
     */
    public function destroy(InscripcioneCompanerismo $inscripcioneCompanerismo)
    {
        //
    }

    public function updateInscripcione(Request $request, Inscripcione $inscripcione){

        if ($request->cordis){
            InscripcioneCompanerismo::where('inscripcione_id', $inscripcione->id)->delete();
            $inscripcione->update([
                'role_id' => 4,
            ]);
            return 'cordis creados';
            
        }
        
        $cant = InscripcioneCompanerismo::where('inscripcione_id', $inscripcione->id)->get()->count();

        if($cant == 0){
            InscripcioneCompanerismo::create([
                'inscripcione_id' => $inscripcione->id,
                'companerismo_id' => $request->companerismo_id
            ]);

            $inscripcione->update([
                'role_id' => 6
            ]);
            return 'create';
        } 
        if ($cant == 1) {
            InscripcioneCompanerismo::where('inscripcione_id', $inscripcione->id)->update([
                'companerismo_id' => $request->companerismo_id
            ]);
            $inscripcione->update([
                'role_id' => 6
            ]);        
            return 'update';
        }


        return $inscripcione->id;
        
    }
}
