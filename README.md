<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

DATABASE CMD

Existem várias opções interessantes, veja alguns exemplos:
\d :: lista as tabelas do banco de dados
\dv :: lista as views do banco de dados
\di :: lista os índices do banco de dados
\db :: lista as tablespaces
\l :: lista os bancos de dados
\dg :: lista as roles existentes (usuários ou grupos)
\conninfo :: apresenta informações sobre a conexão atual
\h :: lista os comandos SQL
\h comando :: apresenta detalhes sobre o comando

### Eloquent com -> Thinker

Definindo um model
$c = new Client();

Quais dados? Nome e idade....
$c->name = 'Um nome';
$c->age = 99;

Salvar os dados
$c->save();

Carregar os dados para alterar
$c = Client::find(1);

Alterar
$c->name = 'Davi Terradas Silva';
$c->age = 8;
$c->save();

Listagem
$clients = Client::all(); (Retorna uma lista por ordem de inserção)
$clients = Client::orderBy('name')->get(); (por ordem alfabética)

Filtros
$clients = Client::where('name', 'like', 'G%')->orderBy('name')->get();

Exclusão
$c = Client::find(id);
$c->delete();


