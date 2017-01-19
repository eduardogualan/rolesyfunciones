<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller {

    public function __construct() {
        $this->middleware('auth', ['only' => ['Home']]);
    }
   
    public function create() {
        Session::flush();
        Auth::logout();
        return Redirect::to('/');
    }

    public function store() {
        $email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password, 'estado' => 'Activo'])) {
            return Redirect::to('/home');
        }else{
          return Redirect::to('/');  
        }
    }

    public function Home() {
        $data['titulo']='ADMIN USUARIOS ROLES Y FUNCIONES';
        return view('home.home', $data);
    }

}
