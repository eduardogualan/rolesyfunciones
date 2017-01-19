<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Rol;
use App\Funciones;
Use App\FuncionRol;

class FuncionesController extends Controller {

    private $rol = null;
    private $funciones = null;
    private $funcionRol = null;

    public function FuncionAsignadoXrol() {
        return response()->json($this->getFunciones(Input::get('id_rol')));
    }

    private function getFunciones($id_rol) {
        $funciones = array();

        $funciones['funcionesAsignados'] = $this->getFuncionesAsignados($id_rol);
        return $funciones;
    }

    private function getFuncionesAsignados($id_rol) {
        $funcionesRol = FuncionRol::where('id_rol', '=', $id_rol)->get();
        $asignados = array();
        foreach ($funcionesRol as $fr) {

            foreach ($this->getFuncioness()->all() as $key => $value) {
                if ($value->id_funcion == $fr->id_funcion) {
                    $asignados[] = $value;
                }
            }
        }

        return $asignados;
    }

    public function asignarFunciones() {
        $this->getFuncionRol()->id_rol = Input::get('id_rol');
        $this->getFuncionRol()->id_funcion = Input::get('id_funcion');
        $this->getFuncionRol()->save();
       // return response()->json('ok');
    }

    public function desasignarFunciones() {
        $rol = $this->getRol()->find(Input::get('id_rol'));
        $funcionRol = FuncionRol::where('id_rol', '=', Input::get('id_rol'))
                        ->where('id_funcion', '=', Input::get('id_funcion'))->get()->first();
        $desasignar = FuncionRol::destroy($funcionRol->id_fr);
    }

    private function getRol() {
        if ($this->rol == null) {
            $this->rol = new Rol();
        }
        return $this->rol;
    }

    private function getFuncioness() {
        if ($this->funciones == null) {
            $this->funciones = new Funciones();
        }
        return $this->funciones;
    }

    private function getFuncionRol() {
        if ($this->funcionRol == null) {
            $this->funcionRol = new FuncionRol();
        }
        return $this->funcionRol;
    }

}
