<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function create(){
        return view('noticias/categoria/formularioCategoria');
    }

    public function store(Request $request){
        $data = $request->all();

        categoria::create($data);

        session()->flash('tipo', 'alert-success');
        session()->flash('msg', 'Cadastrado com sucesso!');
        return redirect()->route('noticia.create');
    }

    public function show($id){
        $cat = categoria::find($id);
        //busca todas as noticias com essa categoria
        $noticias = $cat->noticias()->get();
    }
}
