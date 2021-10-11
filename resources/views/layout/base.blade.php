<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>@yield('titulo')</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Lara-News</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                
                <li class="nav-item">
                  <a class="nav-link" href="{{route('noticia.index')}}">Home</a>
                </li>
                

                @auth
                  <li class="nav-item">
                    <a class="nav-link" href="{{route('noticia.create')}}">Cadastrar noticia</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('sair') }}">Sair</a>
                  </li>
                @endauth

                @guest
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                  </li> 
                @endguest
              </ul>

              <form action="{{route('noticia.search')}}" method="POST" class="form-inline my-2 my-lg-0">
                @csrf
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>

            </div>
          </nav>
    </header>

    <section>
        <div class="container bg-light">
            @yield('conteudo')
        </div>
    </section>

    <footer>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Lara-News</h1>
              <p class="lead">Feito pelo Florisvaldo com muito <i class="fas fa-heart"></i></p>
              <p class="lead"><a href="https://github.com/FlorisvaldoAntonio2"><i class="fab fa-github"></i> GitHub </a></p>
              <p class="lead"><a href="https://linkedin.com/in/florisvaldoantonio"><i class="fab fa-linkedin"></i> linkedin </a></p>
              <p class="lead text-center"> copyright <i class="fas fa-copyright"></i> </a></p>

            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>