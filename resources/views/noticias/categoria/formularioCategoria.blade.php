@extends('layout/base')

@section('titulo')
    Cadastro
@endsection

@section('conteudo')
    <p>Nova Categoria</p>

    <form action="{{route('categoria.store')}}" method="post" enctype="multipart/form-data">
        <div class="form-group">
            @csrf
            <label for="nome">Nome:</label>
            <input class="form-control" type="text" name="nome" id="nome" placeholder="informe o nome:">

            <div class="form-row">
                <div class="col-6">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                    <button class="btn btn-primary" type="reset">Limpar</button>
                </div>
            </div>
        </div>
    </form>
@endsection