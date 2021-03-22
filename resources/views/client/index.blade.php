{{-- herdando da view base --}}
@extends('base')
@section('content')
    <table border="1">
        <tr>
            <th>ID</th>  <th>Nome</th>  <th>Idade</th>
            <th colspan="3">Comandos</th>
        </tr>
        @if( isset($clients) )
            @foreach ($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->age }}</td>
                    <td><button> <a href="{{ route('client.show', $client->id) }}">Mostrar</a> </button></td>
                    <td><button> <a href="{{ route('client.edit', $client->id) }}">Editar</a> </button></td>
                    <td>
                        <form method="post" action="{{ route('client.destroy', $client->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Excluir">
                        </form>
                    </td>
                </tr>   
            @endforeach
        @else
            <tr>
                <td colspan="6">NÃO EXISTEM DADOS PARA SEREM EXIBIDOS!</td>
            </tr>
        @endif
    </table>
@endsection
