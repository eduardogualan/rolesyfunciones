<?php

namespace App\utilidades\consultas;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ConsultasBD {

    /**
     * Funcion que permite obtener los nombres del usuario logueado 
     * @return type
     */
    public static function getUser() {
        if (Auth::user()) {
            $persona = \App\Persona::where('id_persona', Auth::user()->id_persona)->get();
            foreach ($persona as $persona) {
                return $persona->nombres . ' ' . $persona->apellidos;
            }
        }
    }

    /**
     * Funcion que permite obtener el rol del usuario logueado
     * @return type
     */
    public static function getRol() {
        if (Auth::user()) {
            $idRol = \App\Rol::where('id_rol', Auth::user()->id_rol)->get();
            foreach ($idRol as $idRol) {
                return $idRol->nombre_rol;
            }
        }
    }

    /**
     * Funcion que permite obtener los nombres de funciones que le pertenecen al usuario logueado
     * @param type $funcion
     * @return type el nombre de la funcion en un arreglo 
     */
    public static function getFunciones($funcion) {
        if (Auth::user()) {
            return \App\Rol::join("funcionrol", "roles.id_rol", "=", "funcionrol.id_rol")->where('funciones.nombre_funcion', '=', $funcion)
                            ->leftJoin('funciones', function($join) {
                                $join->on('funcionrol.id_funcion', '=', 'funciones.id_funcion');
                            })
                            ->select('funciones.display_nombref', 'funciones.nombre_funcion')
                            ->where('roles.id_rol', '=', Auth::user()->id_rol)
                            ->get();
        }
    }

    public static function getFuncionesAsignadosXRol($id) {
        if (Auth::user()) {
            return \App\Funciones::join('funcionrol', 'funcionrol.id_funcion', '=', 'funciones.id_funcion')
                            ->where('funcionrol.id_rol', '=', $id)
                            ->select('funciones.display_nombref', 'funciones.nombre_funcion')
                            ->orderby('funciones.display_nombref')
                            ->get();
        }
    }

    public static function getFuncionesNoAsignadosXRol($id) {
//        if (Auth::user()) {
        return \App\Funciones::distinct()->join('funcionrol', 'funcionrol.id_funcion', '=', 'funciones.id_funcion')
                       ->where('funcionrol.id_rol', '=', $id)
                ->groupBy('funciones.display_nombref')
                        ->select('funciones.nombre_funcion')
                        ->orderby('funciones.display_nombref')
                        ->get();
//        }
    }

    public function getIdIdFuncion() {
        
    }

    public static function ZonaRestringida() {
        return Redirect::to('home')->with('ErrorMsg', ' Zona Restringido Comuníquese con el Administrador del Sistema');
    }

}
