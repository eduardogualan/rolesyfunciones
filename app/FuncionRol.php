<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FuncionRol extends Model {

    protected $table = 'funcionrol';
    protected $primaryKey = 'id_fr';
    public $timestamps = false;
    protected $fillable = ['id_funcion', 'id_rol'];

    public function funcion() {
        return $this->belongsToMany('App\Funciones', 'id_funcion');
    }

    public function rol() {
        return $this->belongsToMany('App\Rol', 'id_rol');
    }

}
