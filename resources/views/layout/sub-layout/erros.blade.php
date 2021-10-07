@if($errors->any())
    <div class="row justify-content-center">
        <div class="alert alert-danger" role="alert"> 
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
            </ul>
        </div>
    </div>
@endif