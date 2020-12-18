<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = DB::table('personas')
            ->select('personas.*')
            ->get();

        return response()->json([
            "success" => true,
            "personas" => $personas
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

        DB::insert(
            'insert into personas (tipo_documento, numero_documento, nombre, apellido, celular)
        values (?, ?, ?, ?, ?)',
            [
                $solicitud['tipo_documento'],
                $solicitud['numero_documento'],
                $solicitud['nombre'],
                $solicitud['apellido'],
                $solicitud['celular']
            ]
        );

        return response()->json(["success" => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        $persona_id = $persona->id;

        $busqueda = DB::table('personas')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'personas.tipo_documento')
            ->select(
                'personas.id',
                'tipo_documentos.tipo as tipo_documento_nombre',
                'personas.numero_documento',
                'personas.nombre',
                'personas.apellido',
                'personas.celular'
            )
            ->where('personas.id', '=', $persona_id)
            ->first();

        return response()->json([
            "success" => true,
            "persona" => $busqueda
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $solicitud = $request->all();

        DB::update(
            'update personas set(tipo_documento, numero_documento, nombre, apellido, celular) = (?, ?, ?, ?, ?)
        where id = ?',
            [
                $solicitud['tipo_documento'],
                $solicitud['numero_documento'],
                $solicitud['nombre'],
                $solicitud['apellido'],
                $solicitud['celular'],
                $persona->id
            ]
        );

        return response()->json(["success" => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        $persona->delete();

        return response()->json(["succes" => true], 200);
    }
}
