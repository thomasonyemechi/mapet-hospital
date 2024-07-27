<?php

namespace App\Http\Controllers;

use App\Models\Admission;
use App\Models\Client;
use App\Models\Vital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdmissionController extends Controller
{
    function admissionIndex(Request $request)
    {
        $client = '';
        if($request->client) {
            $client = Client::findorFail($request->client);
        }
        return view('admin.new_admission', compact(['client']) );
    }


    function admissionSigleIndex($id)

    {
        $admission = Admission::findorfail($id);
        $client = $admission->client;
        $vitals = Vital::where(['admission_id' => $admission->id])->get();
        return view('admin.single_admission', compact(['admission', 'client', 'vitals']));
    }


    function manageIndex(Request $request)
    {
        $admisions = Admission::orderby('id', 'desc')->paginate(45);
        return view('admin.manage_admissions', compact(['admisions']));
    }


    function newAdmisison(Request $request)
    {
        Validator::make($request->all(), [
            'weight' => 'required|string',
            'height' => 'required|string',
            'blood_pressure' => 'required|string',
            'clinical_concerns' =>'required|string',
        ])->validate();

        $client_id = $this->updateOrCreatePatient($request);
        
        $admission = Admission::create([
            'client_id' => $client_id,
            'user_id' => auth()->user()->id,
            'blood_pressure' => $request->blood_pressure,
            'clinical_concerns' => $request->clinical_concerns,
            'weight' => $request->weight,
            'height' => $request->height,
            'date' => $request->arrival_date_time ?? now(),
        ]);


        Vital::create([
            'admission_id' => $admission->id,
            'temperature' => $request->temperature,
            'respiration_rate' => $request->respiration_rate,
            'pulse_rate' => $request->pulse_rate,
            'clinical_concerns' => $request->clinical_concerns,
            'added_by' => auth()->user()->id,
            'blood_pressure' => $request->blood_pressure,
            'date' => now()
        ]);

        return back()->with('success', 'Admission Info has been sucessfully added');
    }


    function addVitals(Request $request)
    {
        Vital::create([
            'admission_id' => $request->admission_id,
            'temperature' => $request->temperature,
            'respiration_rate' => $request->respiration_rate,
            'pulse_rate' => $request->pulse_rate,
            'clinical_concerns' => $request->clinical_concerns,
            'added_by' => auth()->user()->id,
            'blood_pressure' => $request->blood_pressure,
            'oxygen_rate' => $request->oxygen_rate,
            'date' => now()
        ]);

        return back()->with('success', 'Vital signs has been added');
    }

    
    function deleteVital($id)
    {
        Vital::where('id', $id)->delete();

        return back()->with('success', 'Vitals has been deleted');
    }


    function updateClincalRecords(Request $request)
    {
        Admission::where('id', $request->id)->update([
            'clinical_concerns' => $request->clinical_concerns
        ]);

        return back()->with('success', 'clinical concerns has been updated');
    }
}
