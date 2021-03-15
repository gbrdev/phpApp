<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ env('APP_NAME') }}</title>
</head>
<body>
  <div id="container">
    <header>
      <h1>Cadastro de Clientes</h1>
    </header>
    <nav>
      <ol>
        <li><a href="{{ route('client.index') }}">Principal</a></li>
        <li><a href="{{ route('client.create') }}">Novo Cliente</a></li>
      </ol>
    </nav>
    <div class="content">
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