<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceSummary;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    function newInvocieIndex(Request $request, $id='')
    {
        $client = '';
        if($id or $request->client) {
            $cc = ($request->client) ? $request->client : $id;
            $client = Client::findOrFail($cc);
        }

        $doctors = User::orderby('name', 'asc')->get(['id', 'name']);
        $invoice_number = rand(1111111111111111,656);
        
        return view('pos.create_invoice', compact(['client', 'doctors', 'invoice_number']));

    }


    function printIndex($invoice='')
    {
        $summary = InvoiceSummary::with(['doctor', 'items', 'client'])->findOrFail($invoice);

        return view('print_invoice', compact(['summary']));
    }

    function viewInvocieIndex($invoice)
    {
        $summary = InvoiceSummary::with(['doctor', 'items', 'client'])->findOrFail($invoice);

        $sales_id = $summary->id;
        $doctors = User::orderby('name', 'asc')->get(['id', 'name']);


        return view('admin.view_invoice', compact(['summary', 'sales_id', 'doctors']));
    }




    function createNewInvoice(Request $request)
    {

        $client_id = $this->updateOrCreatePatient($request);


        $summary = InvoiceSummary::create([
            'client_id' => $client_id,
            'doctor_id' => $request->doctor,
            'admission_date' => $request->admission_date,
            'discharge_date' => $request->discharge_date,
            'bed' => $request->bed,
            'invoice_number' => $request->invoice_number,
            'initial_deposit' => $request->initial_deposit ?? 0,
            'outstanding_balance' => $request->outstanding_balance,
            'days' => $request->days ?? 0,
            'total' => $request->total
        ]);


        
        foreach ($request->items as $item) {
            $price = $item['price'];
            $item_id = $item['id'];
            $qty = $item['qty'];
            $item_total = ($price * $qty);
            $res = Invoice::create([
                'invoice_summary_id' => $summary->id,
                'item_id' => $item_id,
                'item_name' => $item['name'] ?? '',
                'qty' => $qty,
                'rate' => $price
            ]);
        }


        if($request->initial_deposit > 0) {
            Payment::create([
                'amount' => $request->initial_deposit ?? 0,
                'user_id' => auth()->user()->id,
                'payment_type' => 'not-listed',
                'invoice_id' => $summary->id,
                'client_id' => $client_id,
            ]);
        }

        return response([
            'message' => 'Invoice summary has been conpleted',
            'sales_id' => $summary->id,
            'status' => true
        ]);


        return;
    }



    function editInvoice(Request $request)
    {
     
        $client_id = $request->client_id;


        $summary = InvoiceSummary::where('id', $request->invoice_summary_id)->update([
            'doctor_id' => $request->doctor,
            'admission_date' => $request->admission_date,
            'discharge_date' => $request->discharge_date,
            'bed' => $request->bed,
            'invoice_number' => $request->invoice_number,
            'initial_deposit' => $request->initial_deposit ?? 0,
            'outstanding_balance' => $request->outstanding_balance,
            'days' => $request->days ?? 0,
            'total' => $request->total
        ]);


        
        foreach ($request->items as $item) {
            $check = Invoice::where(['id' => $item['invoice_id']])->first();

    

            $price = $item['price'];
            $item_id = $item['id'];
            $qty = $item['qty'];
            $item_total = ($price * $qty);

            if($check) {
                $check->update([
                    'item_id' => $item_id,
                    'item_name' => $item['name'] ?? '',
                    'qty' => $qty,
                    'rate' => $price
                ]);
            }else{
                $res = Invoice::create([
                    'invoice_summary_id' => $summary->id,
                    'item_id' => $item_id,
                    'item_name' => $item['name'] ?? '',
                    'qty' => $qty,
                    'rate' => $price
                ]);
            }
        }


        return response([
            'message' => 'Invoie has been updated',
            'sales_id' => $summary->id,
            'status' => true
        ]);
    }





    function deleteInvoice($invoice_id)
    {
        ////check for payment
        $delete_payment = Payment::where('invoice_id', $invoice_id)->delete();
        ///check form items 
        $delete_invoice = Invoice::where('invoice_summary_id' , $invoice_id)->delete();
        ///delete invoice
        InvoiceSummary::where('id', $invoice_id)->delete();

        return back()->with('success', 'Invoice has been removed from transactions');
    }

    function paymentIndex()
    {
        $payments = Payment::orderby('created_at', 'desc')->paginate(50);
        $day = date('Y-m-d');
        $today_pay = Payment::where('created_at', 'like', "%$day%")->sum('amount');

        return view('admin.payments', compact(['today_pay', 'payments']));
    }


    function searchInvoice($invoice)
    {
        $invoice = InvoiceSummary::with(['client'])->where('invoice_number', $invoice)->first();
        
        if(!$invoice) { 
            return response([
                'message' => 'Invoice was not found',
            ], 404);
        }

        $invoice->total_paid = $invoice->total_paid();
        return response($invoice, 200);
    }


    function registerPayment(Request $request)
    {
        Validator::make($request->all(), [
            'invoice_number' => 'required|exists:invoice_summaries,invoice_number',
            'amount' => 'required|integer|min:100',
            'payment_type' => 'required|string',
            'ref' => 'string'
        ])->validate();

        $invoice = InvoiceSummary::where('invoice_number', $request->invoice_number)->first();


        Payment::create([
            'amount' => $request->amount,
            'user_id' => auth()->user()->id,
            'ref' => $request->ref,
            'payment_type' => $request->payment_type,
            'invoice_id' => $invoice->id,
            'client_id' => $invoice->client_id,
        ]);
        return back()->with('success', 'Payment has been regsitered successfuly registerd');
    }


    function deletePayment($pay_id)
    {
        Payment::where('id', $pay_id)->delete();
        return  back()->with('success', 'Payment has been deletd');
    }

 
}
