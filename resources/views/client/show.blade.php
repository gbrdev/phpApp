{{-- herdar da view base --}}
@extends('base')

{{-- iniciando a seção content, onde o código será injetado na view base --}}
@section('content')
    <h1>Visualizando Dados do Cliente</h1>    
    <hr>
    <p>ID: {{ $client->id }}</p>
    <p>Nome: {{ $client->name }}</p>
    <p>Idade {{ $client->age }}</p>

{{-- fim da seção --}}
@endsection

