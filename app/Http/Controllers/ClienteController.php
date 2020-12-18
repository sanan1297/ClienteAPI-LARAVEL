<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = DB::table('clientes')
            ->select(
                'clientes.id',
                'clientes.id_persona',
                'clientes.created_at as fecha_creacion'
            )
            ->get();

        return response()->json([
            "success" => true,
            "clientes" => $clientes
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

        $cliente = Cliente::create($solicitud);

        return response()->json(["success" => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $cliente_id = $cliente->id;

        $busqueda = DB::table('clientes')
            ->join('personas', 'personas.id', '=', 'clientes.id_persona')
            ->select(
                'clientes.id',
                'personas.nombre',
                'clientes.created_at as fecha_creacion'
            )
            ->where('clientes.id', '=', $cliente_id)
            ->get();

        return response()->json([
            "success" => true,
            "cliente" => $busqueda[0]
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $solicitud = $request->all();

        $cliente->update($solicitud);

        return response()->json(["success" => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json(["success" => true], 200);
    }
}
