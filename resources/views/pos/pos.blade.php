@extends('layout.app')
@section('page_title')
    Manage Invoices
@endsection


@section('page_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        Invoice Overview
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Manage Invoice Overview
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="d-flex">
                    <div class="input-group me-3  ">

                        <select name="" class="form-control flatpickr-input " id=""
                            style="width: 150px !important;">
                            @for ($m = 1; $m <= 12; $m++)
                                <option value="{{ $m }}"> {{ date('F', mktime(0, 0, 0, $m, 10)) }} </option>
                            @endfor
                        </select>

                    </div>
                    <a href="/admin/add-expenses" class="btn btn-warning">Check</a>
                </div>


            </div>
        </div>



        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                            <div class="card mb-4 shadow-lg " style="border: 0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between  lh-1">
                                        <div>
                                            <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                            <span class="fs-4  fw-semi-bold">Total Received</span>
                                        </div>
                                        <div>
                                            <h2 class="fw-bold mb-1">
                                                {{ money(\App\Models\Payment::sum('amount')) }}
                                            </h2>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                            <div class="card mb-4 shadow-lg " style="border: 0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between  lh-1">
                                        <div>
                                            <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                            <span class="fs-4  fw-semi-bold">Total Payment</span>
                                        </div>
                                        <div>
                                            <h2 class="fw-bold mb-1">
                                                {{ money(\App\Models\InvoiceSummary::sum('total')) }}
                                            </h2>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                            <div class="card mb-4 shadow-lg " style="border: 0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between  lh-1">
                                        <div>
                                            <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                            <span class="fs-4  fw-semi-bold">Pending</span>
                                        </div>
                                        <div>
                                            <h2 class="fw-bold mb-1">
                                                {{ \App\Models\InvoiceSummary::count() }}
                                            </h2>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="d-flex">
                                <a type="button" href="/invoice/new"
                                    class="btn btn-light add_item me-2 btn-sm py-2 btn-block">
                                    <i class="fe fe-credit-card"> </i> Create New Invoce
                                </a>

      

                                <a href="/invoices" class="btn btn-success me-3 add_category btn-sm py-2 btn-block">
                                    <i class="fe fe-list"> </i> All Invoices
                                </a>


                                
                                <a href="/payments" class="btn btn-secondary me-3 add_category btn-sm py-2 btn-block">
                                    <i class="fe fe-plus-circle"> </i> Register Payment
                                </a>


                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h4 class="card-title fw-bold">Invoices</h4>
                    </div>

                    <div class="table-responsive shadow-lg ">
                        <table class="table table-sm ">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Total</th>
                                    <th>Paid</th>
                                    <th>Invoice No</th>
                                    <th>

                                        Date
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($invoices as $invoice)
                                    <tr>
                                        <td class="align-middle">
                                            <a href="/client/{{ $invoice->client->id }}">
                                                <h4 class="fw-bold fs-5 m-0 p-0 text-info">
                                                    {{ucfirst($invoice->client->lastname . ' ' . $invoice->client->firstname) }}
                                                </h4>
                                            </a>
                                        </td>
                                        <td class="align-middle fw-bold">
                                            {{ money($invoice->total) }}
                                        </td>

                                        <td class="align-middle fw-bold">
                                            {{ money($invoice->initial_deposit) }}
                                        </td>

                                        <td class="align-middle">
                                            <a href="/invoice/{{ $invoice->id }}">
                                                <span class="badge bg-primary">{{ $invoice->invoice_number }}</span>
                                            </a>
                                        </td>
                                        <td>
                                            {{ date('j M Y | h:i a', strtotime($invoice->created_at)) }}
                                        </td>
                                        <td class="align-middle">
                                            <div class="d-flex justify-content-end ">
                                                <div class="d-flex mt-1">
                                                    <a href="/invoice/print/{{ $invoice->id }}" target="_blank"  class="me-2">
                                                        <i class="fe fe-printer" title="Print Invoice"></i>
                                                    </a>
                                                    <a href="javascript:;" class="text-info me-2">
                                                        <i class="fe fe-edit" title="deleted invoice"></i>
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
                </div>
            </div>
        </div>

    </div>
@endsection
