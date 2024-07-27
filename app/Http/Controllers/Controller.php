<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // public function __construct()
    // {
    //     public 
    // }


    function updateOrCreatePatient(Request $request)
    {
        if($request->client_id) {
            $client = Client::where('id', $request->client_id)->update([
                'email' => $request->email,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'age' => $request->age,
                'address' => $request->address,
                'upn' => $request->upn,
            ]);

            return $request->client_id;
        }else {
            $client = Client::updateOrCreate([
                'phone' => $request->phone
            ], [
                'email' => $request->email,
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'age' => $request->age,
                'address' => $request->address,
                'upn' => $request->upn,
            ]);
            return $client->id;
        }

    }
}
