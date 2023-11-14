@extends('site.layout')
@section('title', 'Detalhes')

@section('conteudo')

    <br>
    <div class="row container">

        <div class="col s12 m6">
            <img src="https://gradle.org/images/gradle-400x400.png" alt="" class="responsive-img">
        </div>

        <div class="col s12 m6">
            <h1>{{ $produto->nome }}</h1>
            <p> {{ $produto->descricao }} </p>

            <button class="btn orange btn-large">Comprar</button>
        </div>

    </div>

@endsection
