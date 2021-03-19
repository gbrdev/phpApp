<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class ClientController extends Controller
{
    public function __construct()
    {
        if (!session("clients")) {
            session(["clients" => $this->createClients()]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("client.index")->with("clients", session("clients"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("client.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clients = session("clients");
        $lastId = 0;
        if ($clients) {
            $lastIndex = count($clients) - 1;
            $lastId = $clients[$lastIndex]->id;
        }
        $c = new stdClass();
        $c->id = $lastId + 1;
        $c->name = $request->input("name");
        $c->age = $request->input("age");

        $clients[] = $c;
        session(["clients" => $clients]);
        return redirect(route("client.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //...recupera os dados da sessão
        $clients = session("clients");
        //...procura o client em clientes ussando o id
        $client = $this->arrayFind($clients, $id);
        //
        if ($client) {
            return view("client.show")->with("client", $client);
        } else {
            abort(404);
        }
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

        $client = new stdClass(); //..cria um novo objeto standard
        $client->id = 1;
        $client->name = "Luke Skywalker";
        $client->age = "18";
        $clients[] = $client; //..adiciona o objeto ao array

        $client = new stdClass();
        $client->id = 2;
        $client->name = "Han Solo";
        $client->age = "25";
        $clients[] = $client;

        return $clients; //..retorna os clientes
    }
    /**
     * Procura por um objeto dentro de um array
     * @param array array The array
     * @param int id an in
     * @return object | null
     */
    public function arrayFind($array, $id)
    {
        if ($array) {
            foreach ($array as $obj) {
                if ($obj->id == $id) {
                    return $obj;
                }
            }
            return null;
        }
    }
    /**
     * Retorna a index de um objeto do array ou -1, se o objeto não existir
     * @param array array do array
     * @param string key o key usado no search
     * @param int search o valor do search
     */
    public function arraySearch($array, $key, $search)
    {
        if ($array) {
            $i = 0;
            foreach ($array as $obj) {
                if ($obj->$key == $search) {
                    return $i;
                }
                $i++;
            }
            return -1;
        }
    }
}
