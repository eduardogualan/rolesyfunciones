<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funciones extends Model {

    protected $table = 'funciones';
    protected $primaryKey = 'id_funcion';
    public $timestamps = false;
    protected $fillable = ['nombre_funcion', 'display_nombref'];
    
    public function funcionRol() {
        return $this->hasMany('App\FuncionRol', 'id_funcion');
    }

}
