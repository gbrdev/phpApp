@extends('base')
@section('content')
  <h1>Visualizando dados do Cliente</h1>
  <hr>
  <p>ID: {{ $client->id }}</p>
  <p>Nome: {{ $client->name }}</p>
  <p>Idade: {{ $client->age }}</p>
@endsection