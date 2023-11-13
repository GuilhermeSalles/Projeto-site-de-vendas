@extends('site.layout')
@section('title', 'Essa é pagina Home')

@section('conteudo')

    <br>
    <div class="row container">

        @foreach ($produtos as $produto)
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image">
                        <img src="https://gradle.org/images/gradle-400x400.png">

                        <a class="btn-floating halfway-fab waves-effect waves-light red"><i
                                class="material-icons">visibility</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title">{{ Str::limit($produto->nome, 10) }}</span>
                        <p>{{ Str::limit($produto->descricao, 20) }}</p>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="row center">
        {{ $produtos->links('custom.pagination') }}

    </div>


@endsection
