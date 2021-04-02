<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use stdClass;

class ClientController extends Controller
{ 
    
    public function __construct()
    {
       
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('client.index')
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate(
            $this->getRules(), $this->getErrorMessages()
        );
        
        $client = new Client();
        $client->name = $request->input('name');
        $client->age = $request->input('age');
        $client->save();
        return redirect(route('client.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       

        //..find a client in clients using the id
        $client = Client::find($id);

        //..if a client found, retuns a view with client data
        if($client){
            return view('client.show')->with('client', $client);
        } else { 
            //..else, return an abort
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
        //..search the client using the id
        $client = Client::find($id);

        //..if client exists, return the view with data to be updated
        if($client){        
            return view('client.edit')->with('client', $client);
        } else { 
            //..else, show error 404 - not found
            abort(404);
        }
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
              
        $client = Client::find($id);
        $client->name = $request->input('name');
        $client->age = $request->input('age');
        $client->save();
        
        //..redirects the browser to index route
        return redirect(route('client.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {        
        $client = Client::find($id);
        $client->delete();
        //..redirect to index route to show the updated list of clients
        return redirect(route('client.index'));
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

    /**
     * Search for an object in array collection
     * @param array array The array
     * @param int id An id
     * @return object 
     */
    public function arrayFind($array, $id)
    {
        if($array){
            foreach($array as $obj){
                if($obj->id == $id){
                    return $obj;
                }
            }
            return null;
        }
    }

    /**
     * Returns the index of an object from array or -1, if the object doesn't exist.
     * @param array array The array
     * @param string key The key used to search
     * @param int search The value to search
     * 
     */
    public function arraySearch($array, $key, $search)
    {
        if($array){
            $i = 0;
            foreach($array as $obj){
                if($obj->$key == $search){
                    return $i;
                }
                $i++;
            }
            return -1;
        }
    }

    /**
     * Returns the validation rules
     */
    public function getRules(){
        return [
            'name' => 'string|required|min:5|max:30',
            'age' => 'required|numeric|between:18,30'
        ];    
    }

    /**
     * Returns the error messages.
     */
    public function getErrorMessages(){
        return [
            'name.*' => 'O nome deve ter entre 5 e 30 caracteres',
            'age.*' => 'A idade deve ser um número entre 18 e 30'
        ];
    }

}
