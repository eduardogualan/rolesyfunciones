<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Persona;
use App\Rol;
use App\Cuenta;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;

class CuentaController extends Controller {

    private $cuenta = null;
    private $persona = null;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (\Utilidades::getFunciones('ver_usuarios') == 'ver_usuarios') {
            $data['usuarios'] = $this->getCuenta()->getUsuarios();
            $data['titulo'] = 'LISTAR USUARIOS';
            return view('cuenta.listar', $data);
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function create() {
        if (\Utilidades::getFunciones('crear_usuarios') == 'crear_usuarios') {
            $data['rol'] = Rol::all();
            $data['titulo'] = 'CREAR USUARIOS';
            return view('cuenta.create', $data);
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function store() {
        if (\Utilidades::getFunciones('crear_usuarios') == 'crear_usuarios') {
            $this->cargarObjetoPersona();
            if ($this->getPersona()->save() == true) {
                $this->cargarObjetoCuenta();
                $this->getCuenta()->save();
                return Redirect::to('usuarios')->with('SuccessMsg', ' Registro Guardado');
            } else {
                return Redirect::to('usuarios/create')->with('ErrorMsg', ' Error al Guardar Registro');
            }
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function edit($id) {
        if (\Utilidades::getFunciones('editar_usuarios') == 'editar_usuarios') {
            $this->fijarInstanciaCuenta($this->getCuenta()->find($id));
            $data['rol'] = Rol::all();
            $data['titulo'] = 'EDITAR USUARIOS';
            $data['usuarios'] = $this->getCuenta();
            return view('cuenta.edit', $data);
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function update($id) {
        if (\Utilidades::getFunciones('editar_usuarios') == 'editar_usuarios') {
            $this->fijarInstanciaCuenta($this->getCuenta()->find($id));
            $this->fijarInstanciaPersna($this->getPersona()->find(Input::get('id_persona')));
            $this->cargarObjetoPersona();
            if ($this->getPersona()->save() == true) {
                $this->cargarObjetoCuenta();
                $this->getCuenta()->save();
                return Redirect::to('usuarios')->with('SuccessMsg', ' Registro Modificado');
            } else {
                return Redirect::to('usuarios/'.$id.'/edit')->with('ErrorMsg', ' Error al Modificar Registro');
            }
        } else {
            return \Utilidades::NoAutorizado();
        }
    }

    public function destroy($id) {
        
    }

    private function getPersona() {
        if ($this->persona == null) {
            $this->persona = new Persona();
        }
        return $this->persona;
    }

    private function getCuenta() {
        if ($this->cuenta == null) {
            $this->cuenta = new Cuenta();
        }
        return $this->cuenta;
    }

    private function fijarInstanciaPersna($persona) {
        $this->persona = $persona;
    }

    private function fijarInstanciaCuenta($cuenta) {
        $this->cuenta = $cuenta;
    }

    private function cargarObjetoPersona() {
        $this->getPersona()->cedula_ruc = Input::get('cedula');
        $this->getPersona()->nombres = Input::get('nombres');
        $this->getPersona()->apellidos = Input::get('apellidos');
    }

    private function cargarObjetoCuenta() {
        $this->getCuenta()->email = Input::get('email');
        $this->getCuenta()->estado = 'Activo';
        $this->getCuenta()->password = bcrypt(Input::get('cedula'));
        $this->getCuenta()->remember_token = Input::get('_token');
        $persona = Persona::find($this->getPersona()->id_persona);
        $this->getCuenta()->persona()->associate($persona);
        $rol = Rol::find(Input::get('rol'));
        $this->getCuenta()->rol()->associate($rol);
    }

}
