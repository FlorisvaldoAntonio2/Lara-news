<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegirtrarController extends Controller
{
    public function create(){
        return view("login/formularioRegistro");
    }

    public function store(Request $request){
        $data = $request->except('_token');
        $data['password'] = hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);

        return redirect()->route('noticia.index');
    }
}
