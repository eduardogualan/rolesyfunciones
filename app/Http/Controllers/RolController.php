<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\Rol;
use App\Funciones;

class RolController extends Controller {

    private $rol = null;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (\Utilidades::getFunciones('ver_roles') == 'ver_roles') {
            $data['titulo'] = 'LISTAR ROLES';
            $data['rol'] = $this->getRol()->all();
            $data['funciones'] = Funciones::all();
            return view('roles.listar', $data);
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function create() {
        if (\Utilidades::getFunciones('crear_roles') == 'crear_roles') {
            $data['titulo'] = 'CREAR ROLES';
            return view('roles.create', $data);
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function store() {
        if (\Utilidades::getFunciones('crear_roles') == 'crear_roles') {
            $this->CargarObjeto();
            if ($this->getRol()->save() == true) {
                return Redirect::to('rol')->with('SuccessMsg', ' Registro Guardado');
            } else {
                return Redirect::to('rol/create')->with('ErrorMsg', ' Error al Guardar Registro');
            }
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function edit($id) {
        if (\Utilidades::getFunciones('editar_roles') == 'editar_roles') {
            $this->fijarInstancia($this->getRol()->find($id));
            $data['titulo'] = 'EDITAR ROLES';
            $data['rol'] = $this->getRol();
            return view('roles.edit', $data);
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function update($id) {
        if (\Utilidades::getFunciones('editar_roles') == 'editar_roles') {
            $this->fijarInstancia($this->getRol()->find($id));
            $this->CargarObjeto();
            if ($this->getRol()->save() == true) {
                return Redirect::to('rol')->with('SuccessMsg', ' Registro Modificado');
            } else {
                return Redirect::to('rol/'.$id.'/edit')->with('ErrorMsg', ' Error al Modificar Registro');
            }
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function destroy($id) {
        if (\Utilidades::getFunciones('eliminar_roles') == 'eliminar_roles') {
            $this->fijarInstancia($this->getRol()->find($id));
            if($this->getRol()->delete()==true){
                return Redirect::to('rol')->with('SuccessMsg', ' Registro Eliminado');
            }
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    private function getRol() {
        if ($this->rol == null) {
            $this->rol = new Rol();
        }
        return $this->rol;
    }

    private function fijarInstancia($rol) {
        $this->rol = $rol;
    }

    private function CargarObjeto() {
        $this->getRol()->nombre_rol = Input::get('nombre');
        $this->getRol()->descripcion = Input::get('desc');
    }

}
