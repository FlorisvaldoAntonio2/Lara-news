<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntrarController extends Controller
{
    public function index(){
        return view('login/formularioLogin');
    }

    public function login(Request $request){
        if(!Auth::attempt( $request->only('email', 'password') )){
            return redirect()->back()->withErrors('Erro no login');
        }

        return redirect()->route('noticia.index');
    }
}
