@extends('layout.app')
@section('page_title')
    All Invoices
@endsection


@section('page_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        Invoice
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                All Invoices
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="d-flex">

                </div>


            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-12">
            <div class="card p-3 mt-3">

                <div class="">
                    <div class="">
                        <form action="#" method="POST">@csrf
                            <input type="search" name="" class="form-control mb-3 shadow"
                                placeholder="Search for invoice" id="">
                        </form>
                    </div>
                </div>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Invoice</th>
                            <th>items</th>
                            <th>total</th>
                            <th>Initial <br> payment</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td class="align-middle" >   <a href="/client/{{$invoice->client_id}}">
                                        <h4 class="m-0 fw-bold text-info p-0">{{ ucwords($invoice->client->firstname.' '.$invoice->client->lastname) }}  </h4>
                                    </a>
                                </td>


                                <td class="align-middle" >   <a href="javascript:;">
                     

                                    <span class="badge bg-secondary" >{{ ucwords($invoice->invoice_number) }} </span>
                                </a>
                            </td>


                                <td class="align-middle" > 
                                    <a href="javascript:;">
                                        <h4 class="fw-bold"> {{ $invoice->items->count(); }}</h4>
                                    </a>
                                </td>



                                <td class="align-middle" > 
                                    {{ money($invoice->total) }}
                                </td>


                                
                                <td class="align-middle" > 
                                    {{ money($invoice->initial_deposit) }}
                                </td>

                                <td class="align-middle" > 
                                    
                                    <div class="d-flex justify-content-end ">
                                        <div class="d-flex mt-1">
                                            <a href="/invoice/print/{{ $invoice->id }}" class="me-2">
                                                <i class="fe fe-printer" title="Print Invoice"></i>
                                            </a>
                                            <a href="/invoice/{{$invoice->id}}" class="text-info me-2">
                                                <i class="fe fe-edit" title="Edit invoice"></i>
                                            </a>
                                            <a href="/delete_invoice/{{ $invoice->id }}" onclick="return confirm('Invoice and payments will be deleted')"  class="text-danger ">
                                                <i class="fe fe-trash"  title="deleted invoice"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="nav d-flex mt-3 justify-content-end ">
                {{ $invoices->links('pagination::bootstrap-4') }}
            </div>
        </div>

    </div>
@endsection
