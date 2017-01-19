<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use App\utilidades\consultas\ConsultasBD;
class Utilidades {
    /**
     * Funcion que permite obtener los nombres del usuario logueado
     * @return nombres del usuarios que actualmente esta logueado en el sistema
     */
    public static function getNombreUsuarioLogueado() {
        return ConsultasBD::getUser();
    }

    public static function getFunciones($funcion) {
        foreach (ConsultasBD::getFunciones($funcion) as $item){
            return $item->nombre_funcion;
        }
    }
    
    public static function getRol() {
        return ConsultasBD::getRol();
    }
    
    public static function getFuncionAsignadoXRol($id) {
        return ConsultasBD::getFuncionesAsignadosXRol($id);
    }
    public static function getFuncionNoAsignadoXRol($id) {
        return ConsultasBD::getFuncionesNoAsignadosXRol($id);
    }
    
    public static function NoAutorizado() {
        return ConsultasBD::ZonaRestringida();
    }

}
