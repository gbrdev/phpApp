@extends('base')
@section('content')

<form method="POST" action="{{ route('client.store') }}">
  @method('POST')
  @csrf
  <label for="name">Nome</label>
  <input type="text" name="name" id="name" required><br>
  <label for="age">Idade</label>
  <input type="number" step="1" name="age" id="age" required><br>
  <input type="submit" name="command" value="Salvar">
  <input type="reset" value="Limpar">
</form>

@endsection