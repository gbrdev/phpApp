<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/helloworld/{name}/{city}/{email?}', function($name, $city, $email = null){
    $result = "<h1>Hello {$name} !!!</h1>";
    $result .= "<h2>Cidade:{$city}</h2>";
    $result .= is_null($email) ? '' : "<h2>{$email}</h2>";
    return $result;
})->where('name', '[A-Za-z]+')->name('hello');

//..agrupando rotas por prefixo - organizar o arquivo de rotas
Route::prefix('/app')->group( function(){

    Route::get('/', function (){
        return "Hello My App!";
    });

    Route::get('/user/{name}', function($name){
        return "User {$name}";
    });

});

//--------------------------------------------------------------------

Route::get('/product', [ProductController::class, 'index'])->name('product');

Route::get('/product/add/{product}', 
    [ProductController::class, 'addProduct'])
    ->name('addProduct');

//---------------------------------------------------------------------

//..definindo as rotas para o controlador resource
Route::resource('/client', ClientController::class);

