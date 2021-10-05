@extends('layout/base')

@section('titulo')
    Atualização
@endsection

@section('conteudo')
    <p>Formulario de Atualização</p>

    <form action="{{route('noticia.update' , $noticia->id)}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            @csrf
            @method('put')
            <label for="titulo">Titulo:</label>
            <input class="form-control" type="text" name="titulo" id="titulo" value="{{$noticia->titulo}}" placeholder="informe o titulo:">

            <label for="conteudo">Conteudo:</label>
            <textarea class="form-control" name="conteudo" id="conteudo" cols="30" rows="10" placeholder="Informe o conteudo:">{{$noticia->conteudo}}</textarea>

            <div class="form-row">
                <div class="col-6">
                    <label for="categoria">Categoria:</label>
                    <select class="custom-select" name="categoria" id="categoria">
                        <option value="esporte">Esporte</option>
                        <option value="arte">Arte</option>
                        <option value="lazer">Lazer</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="img">Img</label>
                    <input class="custom-file" type="file" name="img">
                </div>
            </div>

            <div class="form-row">
                <div class="col-6">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    <button class="btn btn-primary" type="reset">Limpar</button>
                </div>
            </div>
        </div>
    </form>

@endsection