@extends('base')

@section('content')

    <form method="post" action="{{ route('client.store') }}">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" > <br>
        @error('name')
            <div style="color:red">{{ $message }}</div>
        @enderror
        <label for="age">Idade:</label>
        <input type="number" step="1" id="age" name="age" value="{{ old('age') }}" > <br>
        @error('age')
            <div style="color:red">{{ $message }}</div>
        @enderror
        <input type="submit" name="command" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

@if ($errors->any()) 

<h3>Erros</h3>
<ul>
    @foreach ($errors->all() as $error)
        <li> {{ $error }} </li>  
    @endforeach
</ul>

@endif



@endsection