<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    // use HasFactory;

    protected $fillable = [
        'tipo',
    ];

    public function personas()
    {
        return $this->hasOne('App\TipoDocumento');
    }}
