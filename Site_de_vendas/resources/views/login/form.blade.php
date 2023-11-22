@if ($mensagem = Session::get('erro'))
    <div class="card blue darken-1">
        <div class="card-content white-text">
            <span class="card-title">Algo errado!</span>
            <p> {{ $mensagem }}</p>
        </div>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $erro)
        {{ $erro }} <br>
    @endforeach


@endif

<form action="{{ route('login.auth') }}" method="post">
    @csrf

    E-mail <br> <input type="email" name="email" id="email"> <br>
    Senha <br> <input type="password" name="password" id="password"> <br>

    <button type="submit"> Entrar </button>

</form>
