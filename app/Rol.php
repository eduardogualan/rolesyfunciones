<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

    protected $table = 'roles';
    protected $primaryKey = 'id_rol';
    public $timestamps = false;
    protected $fillable = ['nombre_rol', 'descripcion_rol'];

    public function funcionRol() {
        return $this->hasMany('App\FuncionRol', 'id_rol');
    }

    public function cuenta() {
        return $this->hasOne('App\Cuenta', 'id_rol');
    }

}
