@extends('layout/base')

@section('titulo')
    Registro
@endsection

@section('conteudo')

    @if(session('msg'))
        <div class="row justify-content-center">
            <div class="alert {{ session('tipo') }}" role="alert"> {{ session('msg') }} </div>
        </div>
    @endif

    <form action="{{route('registro.store')}}" method="post">
        <div class="form-group">
            @csrf
            <label for="name">Nome:</label>
            <input class="form-control" type="text" name="name" id="name" required placeholder="Nome:">

            <label for="email">E-mail:</label>
            <input class="form-control" type="email" name="email" id="email" required placeholder="Login:">

            <label for="password">Senha:</label>
            <input class="form-control" type="password" name="password" id="password" required placeholder="Senha:">

            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </div>
    </form>

@endsection