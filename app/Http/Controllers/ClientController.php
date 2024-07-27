<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Client;
use App\Models\InvoiceSummary;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    function clientIndex()
    {
        $clients = Client::orderby('id', 'desc')->limit(6)->get();
        return view('admin.new_client', compact(['clients']));
    }


    function allClient()
    {
        $clients = Client::orderby('id', 'desc')->paginate(20);
        return view('admin.all_client', compact(['clients']));
    }


    function clientProfileIndex($id)
    {
        $user = Client::findorfail($id);
        $admisions = Admission::where('client_id', $user->id)->get();
        $invoices = InvoiceSummary::where('client_id', $user->id)->get();
        $payments = Payment::where('client_id', $user->id)->get();
        return view('admin.client_profile', compact(['user', 'admisions', 'invoices', 'payments']));
    }


    function searchClient(Request $request)
    {
        $clients = Client::where('firstname', 'like', "%$request->s%")->
        orwhere('other_names', 'like', "%$request->s%")->
        orwhere('lastname', 'like', "%$request->s%")->
        orwhere('card_no', 'like', "%$request->s%")->
        orwhere('id', 'like', "%$request->s%")->
        orwhere('email', 'like', "%$request->s%")->
        orwhere('phone', 'like', "%$request->s%")->
        orwhere('address', 'like', "%$request->s%")->limit(20)->get();
        return response($clients);
    }


    function createClientProfile(Request $request)
    {
        Validator::make($request->all(), [
            'title' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|string',
            'email' => 'string',
        ])->validate();

        $client = Client::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'other_names' => $request->other_names,
            'gender' => $request->gender,
            'age' => $request->age,
            'phone' => $request->phone,
            'address' => $request->address,
            'organization' => $request->organization,
            'email' => $request->email,
            'blood_group' => $request->blood_group,
            'blood_pressure' => $request->blood_pressure,
            'title' => $request->title,
            'upn' => $request->upn,
            'lga' => $request->lga,
            'card_type' => $request->card_type,
            'emergency_surname' => $request->emergency_surname,
            'emergency_firstname' => $request->emergency_firstname,
            'emergency_contact' => $request->emergency_contact,
            'emergency_relationship' => $request->emergency_relationship,
            'genotype' => $request->genotype,
        ]);

        return redirect('/client/'.$client->id)->with('success', 'Patient profile has been sucessfully created');
    }

}
