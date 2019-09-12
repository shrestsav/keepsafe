<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\ClientContact;
use App\PantryPrice;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return $clients;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:clients',
            'billing_email' => 'required|string|max:255|unique:clients',
            'suburb' => 'required|string|max:255',
            'footnote' => 'required|string|max:555',
        ]);

        $client = Client::create($request->all());

        if(count($request->contacts) && $client){
            foreach ($request->contacts as $contact) {
                $contact['client_id'] = $client->id;
                $contact = ClientContact::create($contact);
            }
        }

        return $client->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::where('id',$id)->with('contacts')->first();
        return response()->json($client);
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'billing_email' => 'required|string|max:255',
            'suburb' => 'required|string|max:255',
            'footnote' => 'required|string|max:555',
        ]);
        $contacts = $request['contacts'];
        unset($request['contacts']);
        $update = Client::where('id',$id)->update($request->all());
        return $id;
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

    public function clientContacts(Request $request)
    {
        $clientContacts = Client::find($request->client_id)->contacts;
        return $clientContacts;
    }

    public function defaultPantryPrice()
    {
        $pantryPrice = PantryPrice::where('client_id',0)->first();
        return $pantryPrice;
    }

    public function clientPantryPrice($client_id)
    {
        $pantryPrice = PantryPrice::where('client_id',$client_id)->first();
        return $pantryPrice;
    }

    public function setClientPantryPrice(Request $request, $client_id)
    {
        // return $request->all();
        $setPantryPrice = PantryPrice::updateOrCreate(
                                    ['client_id' => $client_id],
                                    $request->all()
                                );
        return $setPantryPrice;
    }
}
