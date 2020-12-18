<?php

namespace App\Http\Controllers;

use App\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asesores = DB::table('asesors')
            ->select(
                'asesors.id',
                'asesors.id_persona',
                'asesors.created_at as fecha_creacion'
            )
            ->get();

        return response()->json([
            "success" => true,
            "asesores" => $asesores
        ], 200);
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
        $solicitud = $request->all();

        $asesor = Asesor::create($solicitud);

        return response()->json(["success" => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function show(Asesor $asesor)
    {
        $asesor_id = $asesor->id;

        $busqueda = DB::table('asesors')
            ->join('personas', 'personas.id', '=', 'asesors.id_persona')
            ->select(
                'asesors.id',
                'personas.nombre',
                'asesors.created_at as fecha_creacion'
            )
            ->where('asesors.id', '=', $asesor_id)
            ->get();

        return response()->json([
            "success" => true,
            "asesor" => $busqueda[0]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function edit(Asesor $asesor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asesor $asesor)
    {
        $solicitud = $request->all();

        $asesor->update($solicitud);

        return response()->json(["success" => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asesor  $asesor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asesor $asesor)
    {
        $asesor->delete();

        return response()->json(["success" => true], 200);
    }
}
