@extends('layout/base')

@section('titulo')
    Home
@endsection

@section('conteudo')

    @if(session('msg'))
        <div class="row justify-content-center">
            <div class="alert {{ session('tipo') }}" role="alert"> {{ session('msg') }} </div>
        </div>
    @endif
    <div class="row justify-content-center">
        @if (false)
        {{dd($noticias['items']['items'])}}
            <h1>Não ha noticias cadastradas</h1>
        @else
                @foreach ($noticias as $noticia)
                    <div class="col-12-sm col-4-lg">
                        <div class="card border-dark text-center mb-3 ml-3 mt-3" style="width: 18rem;">
                            <img class="card-img-top" src="{{ url("storage/{$noticia->img}") }}" alt="{{$noticia->titulo}}" height="250">
                            <div class="card-body">
                                <h5 class="card-title">{{$noticia->titulo}}</h5>
                                <p class="card-text"><?php echo substr($noticia->conteudo, 0 , 40); ?></p>
                                <a href="{{route('noticia.show' , ['id' => $noticia->id])}}" class="btn btn-primary">Saiba mais...</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            
        @endif
    </div>
    <div class="row justify-content-center">
        {{ $noticias->links() }}
    </div>
@endsection