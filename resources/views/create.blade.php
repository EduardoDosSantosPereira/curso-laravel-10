<h1>Novo publicador</h1>

@if ($errors->any())
    @foreach($errors->all() as $error)
        {{$error}}
    @endforeach
@endif

<form action="{{route('publicador.store')}}" method="POST">
    @csrf()
    <input type="text" name="nome" id="nome" placeholder="Nome">
    <button type="submit">Salvar</button>
</form>