@extends('site.layout')
@section('title', 'Carrinho')

@section('conteudo')

    <br>
    <div class="row container">
        @if ($mensagem = Session::get('sucesso'))
            <div class="card green darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Parabéns</span>
                    <p> {{ $mensagem }}</p>
                </div>
            </div>
        @endif

        @if ($mensagem = Session::get('aviso'))
            <div class="card blue darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Tudo bem!</span>
                    <p> {{ $mensagem }}</p>
                </div>
            </div>
        @endif


        @if ($itens->count() == 0)

            <div class="card orange darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Seu carrinho está vazio!</span>
                    <p> Aproveite nossas promoções</p>
                </div>
            </div>
        @else
            <h5>Seu carrinho possui {{ $itens->count() }} produtos.</h5>
            <table>
                <thead class="stripped">
                    <tr>
                        <th></th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th></th>
                    </tr>
                </thead>
                @foreach ($itens as $item)
                    <tbody>
                        <tr>
                            <td><img src="https://gradle.org/images/gradle-400x400.png" alt="" width="70"
                                    class="responsive-img circle"></td>
                            <td>{{ $item->name }}</td>
                            <td>R$ {{ number_format($item->price, 2, ',', '.') }}</td>

                            {{-- Formulario Atualizar Carrinho --}}
                            <form action="{{ route('site.atualizacarrinho') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <td><input style="width: 40px; font-weight: 900;" class="white center" min="1" type="number"
                                        name="quantity" value="{{ $item->quantity }}"></td>
                                <td>

                                    <button class="btn-floating waves-effect waves-light orange"><i
                                            class="material-icons">refresh</i></button>
                            </form>

                            {{-- Formulario remove Carrinho --}}
                            <form action="{{ route('site.removeCarrinho') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn-floating waves-effect waves-light red"><i
                                        class="material-icons">delete</i></button>
                            </form>


                            </td>
                        </tr>
                @endforeach

                </tbody>
            </table>



            <div class="card green darken-1">
                <div class="card-content white-text">
                    <span class="card-title" style="font-weight: 700">Total: R$ {{ number_format(\Cart::getTotal(), 2, ',', '.') }} </span>
                    <p>Pague em até 12x sem juros.</p>
                </div>
            </div>

        @endif
        <br>

        <div class="row container center">
        @if ($itens->count() == 0)
                <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Voltar as compras <i
                        class="material-icons right">arrow_back</i></a>
            @else
                <a href="{{ route('site.index') }}" class="btn waves-effect waves-light blue">Continuar comprando <i
                        class="material-icons right">arrow_back</i></a>
                <a href="{{ route('site.limparcarrinho') }}" class="btn waves-effect waves-light blue">Limpar carrinho <i
                        class="material-icons right">clear</i></a>
                <button class="btn waves-effect waves-light green">Finalizar Pedido <i
                        class="material-icons right">check</i></button>
        @endif
    </div>

    </div>





@endsection
