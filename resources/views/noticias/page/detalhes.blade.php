@extends('layout/base')

@section('titulo')
    Noticia {{$noticia->titulo}}
@endsection

@section('conteudo')
    
    <div class="jumbotron">
        <h1 class="display-6">{{$noticia->titulo}}</h1>
        <hr class="my-4">
        <p class="lead">Data Criação: {{$noticia->created_at}}</p>
        <p class="lead">Ultima Atualização: {{$noticia->updated_at}}</p>
        <p class="lead">Categoria: {{$categoria->nome}}</p>
        
    </div>
    
    
    <div class="row justify-content-center">
        <img src="{{ url("storage/{$noticia->img}") }}" alt="{{$noticia->titulo}}" height="250">
    </div>

    <div class="row justify-content-center">
        <p>{{$noticia->conteudo}}</p>
    </div>
    @auth
        <div class="row justify-content-center">
            <a href="{{ route('noticia.edit' , $noticia->id) }}"><button class="btn-primary">Editar</button></a>
        
            <form action="{{ route('noticia.destroy' , $noticia->id) }}" method="post" onsubmit="return confirm('Tem certeza?')">
                @csrf
                @method('delete')   

                <button class="btn-danger" type="submit">Deletar</button>
            </form>
        </div>
    @endauth
    


@endsection