<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class ClientController extends Controller
{
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //..pegar os clientes
        $clients = $this->createClients();

        //..retorna a view passando o parâmetro 
        return view('client.index')->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createClients()
    {
        $clients = []; //..cria um array vazio
        
        $client = new stdClass; //..cria um novo objeto standard
        $client->id = 1;
        $client->name = 'Luke Skywalker';
        $client->age = '18';
        $clients[] = $client; //..adiciona o objeto ao array

        $client = new stdClass;
        $client->id = 2;
        $client->name = 'Han Solo';
        $client->age = '25';
        $clients[] = $client;

        return $clients; //..retorna os clientes
    }

}
