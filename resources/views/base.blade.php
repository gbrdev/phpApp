<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>
    <div id="container">
        <header>
            <h1>Cadastro de Clientes</h1>
        </header>
        <nav>
            <ol>
                <li> <a href=" {{ route('client.index') }} ">Início</a></li>
                <li> <a href=" {{ route('client.create') }} ">Novo</a> </li>
            </ol>
        </nav>
        <div class="content">
            {{-- a diretiva yield injeta um código na view --}}
            @yield('content') 
        </div>
        <footer>
            <small>
                <p>{{ env('APP_NAME') }}</p>
            </small>            
        </footer>

    </div>    
</body>
</html>