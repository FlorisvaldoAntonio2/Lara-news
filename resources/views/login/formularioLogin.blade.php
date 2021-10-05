@extends('layout/base')

@section('titulo')
    Login
@endsection

@section('conteudo')

    <h1>Login</h1>

    @if($errors->any())
        <div class="row justify-content-center">
            <div class="alert alert-danger" role="alert"> 
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach 
            </div>
        </div>
    @endif

    <form action="{{route('login')}}" method="post">
        <div class="form-group">
            @csrf
            <label for="email">E-mail:</label>
            <input class="form-control" type="email" name="email" id="email" required placeholder="Login:">

            <label for="password">Senha:</label>
            <input class="form-control" type="password" name="password" id="password" required placeholder="Senha:">

            <button class="btn btn-primary" type="submit">Entrar</button>
        </div>

    </form>

    <a href="{{route('registro.create')}}">Resgistrar-se</a>

@endsection