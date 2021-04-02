<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //..define um array com produtos
    private $products = ['Notebook', 'Playstation 5', 'SmarTv'];

    //..define um método index
    public function index()
    {
        echo "<h1>Lista de Produtos</h1>";
        echo "<ul>";
        foreach($this->products as $product)
        {
            echo "<li>{$product}</li>";
        }
        echo "</ul>";
    }

    //..método para adicionar um produto no array de produtos 
    public function addProduct(string $product)
    {
        $this->products[] = $product;
        $this->index();
    }

}
