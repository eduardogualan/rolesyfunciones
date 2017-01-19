<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model {

    protected $table = 'persona';
    protected $primaryKey = 'id_persona';
    public $timestamps = false;
    protected $fillable = ['cedula_ruc', 'apellidos','nombres'];
    
    public function cuenta() {
        return $this->hasOne('App\Persona','id_persona');
    }
    

}
