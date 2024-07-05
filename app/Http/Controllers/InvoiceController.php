<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    function newInvocieIndex($id='')
    {
        $client = '';
        if($id) {
            $client = Client::findOrFail($id);
        }
        
        return view('pos.create_invoice', compact(['client']));

    }
}
