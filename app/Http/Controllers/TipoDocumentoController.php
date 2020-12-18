<?php

namespace App\Http\Controllers;

use App\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_documento = DB::table('tipo_documentos')
            ->select('tipo_documentos.*')
            ->get();

        return response()->json([
            "success" => true,
            "tipos" => $tipo_documento
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

        DB::insert('insert into tipo_documentos (tipo) values (?)', [$solicitud['tipo']]);

        return response()->json(["success" => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoDocumento $tipoDocumento)
    {
        $tipo_id = $tipoDocumento->id;

        $busqueda = DB::table('tipo_documentos')
            ->select(
                'tipo_documentos.*'
            )
            ->where('tipo_documentos.id', '=', $tipo_id)
            ->first();

        return response()->json([
            "success" => true,
            "tipo" => $busqueda
        ], 200);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoDocumento $tipoDocumento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoDocumento $tipoDocumento)
    {
        $solicitud = $request->all();

        DB::update(
            'update tipo_documentos set tipo = ? where id = ?',
            [$solicitud['tipo'], $tipoDocumento->id]
        );

        return response()->json(["success" => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoDocumento  $tipoDocumento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoDocumento $tipoDocumento)
    {
        $tipoDocumento->delete();

        return response()->json(["success" => true]);
    }
}
