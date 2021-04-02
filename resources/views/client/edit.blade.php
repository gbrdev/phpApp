@extends('base')

@section('content')

    <form method="post" action="{{ route('client.update', $client->id ) }}">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input value="{{ $client->name }}" type="text" name="name" id="name" required> <br>
        <label for="age">Idade:</label>
        <input value="{{ $client->age }}" type="number" step="1" id="age" name="age" required> <br>
        <input type="submit" name="command" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

@endsection