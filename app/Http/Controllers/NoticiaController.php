<?php

namespace App\Http\Controllers;

use App\Http\Requests\validaNoticia;
use App\Models\categoria;
use App\Models\noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends Controller
{
    public function index(){
        $noticias = noticia::paginate(6);
        
        return view('noticias/page/home', ['noticias' => $noticias] );

    }

    public function show($id){
        $noticia = noticia::find($id);
       
        if(is_null($noticia)){
            session()->flash('tipo', 'alert-danger');
            session()->flash('msg', 'Noticia não encontrada!');
            return redirect()->route('noticia.index');
        }
        
        //busca atraves do metodo criado no model o relacionamento com categoria
        $cat = $noticia->categoria()->first();

        return view('noticias/page/detalhes', ['noticia' => $noticia, 'categoria' => $cat]);
    }

    public function create(){
        $categorias = categoria::all();
        return view('noticias/page/formulario' , ['categorias' => $categorias]);
    }

    public function store(validaNoticia $request){
        $data = $request->all();
        
        if($request->hasFile('img') ){
            $img = $request->img->store('noticias') ;
            $data['img'] = $img;
        }
        noticia::create($data);

        session()->flash('tipo', 'alert-success');
        session()->flash('msg', 'Cadastrado com sucesso!');
        return redirect()->route('noticia.index');
    }

    public function destroy($id){
        $noticia = noticia::find($id);

        if(is_null($noticia)){
            session()->flash('tipo', 'alert-danger');
            session()->flash('msg', 'Noticia não encontrada!');
            return redirect()->route('noticia.index');
        }

        if(Storage::exists($noticia->img)){
            Storage::delete($noticia->img);
        }

        $noticia->delete();

        session()->flash('tipo', 'alert-success');
        session()->flash('msg', 'Deletada com sucesso!');
        return redirect()->route('noticia.index');
    }

    public function edit($id){
        $noticia = noticia::find($id);
        $categorias = categoria::all();
        return view('noticias/page/formEdit' , ['noticia' => $noticia , 'categorias' => $categorias]);
    }

    public function update($id, Request $request){
        $data = $request->all();
        $noticia = noticia::find($id);

        if(is_null($noticia)){
            session()->flash('tipo', 'alert-danger');
            session()->flash('msg', 'Noticia não encontrada!');
            return redirect()->route('noticia.index');
        }

        if(Storage::exists($noticia->img) && array_key_exists('img', $data)){
            Storage::delete($noticia->img);
        }

        if($request->hasFile('img')){
            $img = $request->img->store('noticias') ;
            $data['img'] = $img;
        }

        $noticia->update($data);
        session()->flash('tipo', 'alert-success');
        session()->flash('msg', 'Atualizado com sucesso!');
        return redirect()->route('noticia.index');
    }

    public function search(Request $request){
        //definimos o termo da busca
        $data = $request->search;
        //pegamos todo o request para o filtro (nosso filtro precisar ser um array)
        $filtro = $request->except('_token');

        $noticias = noticia::where('titulo','like', '%' . $data . '%')->paginate(6);

        return view('noticias/page/home', ['noticias' => $noticias , "filtro" => $filtro] );
    }
}
