@extends('layout/base')

@section('titulo')
    Home
@endsection

@section('conteudo')

    @include('layout/sub-layout/mensagens' , ['msg' => session('msg') , 'tipo' => session('tipo')])

    <div class="row justify-content-center border mb-1">
        <form action="{{route('noticia.filter')}}" method="post">
            @csrf
            <label>Orderna: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filter" id="filter1" value="titulo">
                <label class="form-check-label" for="filter1">
                  Nome
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="filter" id="filter2" value="created_at">
                <label class="form-check-label" for="filter2">
                  Data
                </label>
              </div>
              <button class="btn btn-primary btn-sm" type="submit">Aplicar</button>
        </form>
    </div>

    <div class="row justify-content-center border mb-3">
        @foreach ($noticias as $noticia)
            <div class="col-12-sm col-4-lg">
                <div class="card border-dark text-dark bg-light mb-3 text-center mb-3 ml-3 mt-3" style="width: 18rem;">
                    <img class="card-img-top" src="{{ url("storage/{$noticia->img}") }}" alt="{{$noticia->titulo}}" height="250">
                    <div class="card-body">
                        <h5 class="card-title">{{$noticia->titulo}}</h5>
                        <p class="card-text">@php echo substr($noticia->conteudo, 0 , 80); @endphp</p>
                        <a href="{{route('noticia.show' , ['id' => $noticia->id])}}" class="btn btn-primary">Saiba mais...</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row justify-content-center">
        @if (isset($filtro))
            {{ $noticias->appends($filtro)->links() }}
        @else
            {{ $noticias->links() }}
        @endif
    </div>
@endsection