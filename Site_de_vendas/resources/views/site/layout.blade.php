<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="icon" type="image/x-icon" href="https://gradle.org/images/gradle-400x400.png">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>


    <!-- Dropdown Structure -->
    <ul id='dropdown1' class='dropdown-content'>
        @foreach ($categoriasMenu as $categoriaM)
            <li><a href="{{ route('site.categoria', $categoriaM->id) }}"> {{ $categoriaM->nome }} </a></li>
        @endforeach
    </ul>

    <!-- Dropdown Login -->
    <ul id='dropdown2' class='dropdown-content'>

        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>

    </ul>


    <nav class="red">
        <div class="nav-wrapper container ">
            <a href="#" class="brand-logo center">Curso Laravel</a>
            <ul id="nav-mobile" class="left" class="right hide-on-med-and-down">
                <li><a href="{{ route('site.index') }}">Home</a></li>
                <li><a href="" class="dropdown-trigger" data-target="dropdown1">Categorias <i
                            class="material-icons right">expand_more</i> </a></li>
                <li><a href="{{ route('site.carrinho') }}">Carrinho<span class="new badge white"
                            style="color: red; font-weight: 900; border-radius: 100px"
                            data-badge-caption="">{{ \Cart::getContent()->count() }}</span></a></li>
            </ul>

            {{-- Menu user --}}
            <ul id="nav-mobile" class="right" class="right hide-on-med-and-down">

                <li><a href="" class="dropdown-trigger" data-target="dropdown2">Olá
                        {{ auth()->user()->firstName }}! <i class="material-icons right">expand_more</i> </a></li>

            </ul>
        </div>
    </nav>


    @yield('conteudo')

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        /* Dropdown */
        var elemDrop = document.querySelectorAll('.dropdown-trigger');
        var instanceDrop = M.Dropdown.init(elemDrop, {
            coverTrigger: false,
            constrainWidth: false
        });
    </script>
</body>

</html>
