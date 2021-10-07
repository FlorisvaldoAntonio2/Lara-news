@if(session('msg'))
    <div class="row justify-content-center">
        <div class="alert {{ session('tipo') }}" role="alert"> {{ session('msg') }} </div>
    </div>
@endif