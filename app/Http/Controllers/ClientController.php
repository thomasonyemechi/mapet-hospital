<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    function clientIndex()
    {
        return view('admin.new_client');
    }



    function searchClient(Request $request)
    {
        $clients = Client::where('name', 'like', "%$request->s%")->
        orwhere('card_no', 'like', "%$request->s%")->
        orwhere('id', 'like', "%$request->s%")->
        orwhere('email', 'like', "%$request->s%")->
        orwhere('phone', 'like', "%$request->s%")->
        orwhere('address', 'like', "%$request->s%")->limit(20)->get();
        return response($clients);
    }

}
