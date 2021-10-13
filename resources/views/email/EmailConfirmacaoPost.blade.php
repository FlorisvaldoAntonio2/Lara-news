@component('mail::message')
    
    <h1>Nova Noticia</h1>

    {{$user->name}} cadastrou uma nova noticia!
    Titulo da noticia: {{$noticia->titulo}}
    Data: {{$noticia->created_at}}

@endcomponent