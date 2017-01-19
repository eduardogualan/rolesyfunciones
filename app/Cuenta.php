<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Cuenta extends Authenticatable {

    protected $table = 'cuenta';
    protected $primaryKey = 'id_cuenta';
    public $timestamps = false;
    protected $fillable = ['email', 'password', 'estado', 'id_persona', 'id_rol'];
    protected $hidden = ['remembertoken'];

    public function persona() {
        return $this->belongsTo('App\Persona', 'id_persona');
    }

    public function rol() {
        return $this->belongsTo('App\Rol', 'id_rol');
    }

    public function getUsuarios() {
        return DB::table('cuenta')->join('persona', 'cuenta.id_persona', '=', 'persona.id_persona')
                        ->leftJoin('roles', function($join) {
                            $join->on('cuenta.id_rol', '=', 'roles.id_rol');
                        })
                        ->select('persona.*', 'cuenta.estado', 'cuenta.id_cuenta', 'roles.nombre_rol')
                        ->orderby('persona.apellidos')
                        ->get();
    }

}
