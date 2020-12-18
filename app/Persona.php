<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    // use HasFactory;

    protected $fillable = [
        'tipo_documento',
        'numero_documento',
        'nombre',
        'apellido',
        'apellido'
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo('App\TipoDocumento', 'tipo_documento', 'id');
    }

    public function clientes()
    {
        return $this->hasOne('App\Cliente');
    }

    public function asesores()
    {
        return $this->hasOne('App\Asesor');
    }}
