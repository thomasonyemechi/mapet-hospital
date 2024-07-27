@extends('layout.admin')
@section('page_title')
    Patient Profile | {{ $user->firstname }} {{ $user->lastname }}
@endsection



@section('page_content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            Patient Profile
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Patients </a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#">
                                        {{ $user->title . ' ' . $user->lastname . ' ' . $user->firstname }}</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nav btn-group" role="tablist">
                        <div class="input-group me-3  ">

                            <select name="" class="form-control flatpickr-input ">
                                <option value="">Select Client</option>
                            </select>

                        </div>
                    </div>
                </div>
            </div>



            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header d-flex justify-content-between  ">
                        <h5 class="mb-0 fw-bold ">Patient Details</h5>
                    </div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex justify-content-st ">
                                    <div class="me-5">
                                        <img src="{{ Avatar::create(strtoupper($user->firstname . ' ' . $user->lastname))->toBase64() }}"
                                            style="" />
                                    </div>
                                    <div>
                                        <h2 class="fw-bold mb-0">
                                            {{ $user->title . ' ' . $user->lastname . ' ' . $user->firstname }}
                                        </h2>
                                        <span class="text-primary small" style="line-height: 1px !important">
                                            {{ $user->address }} </span>
                                        <div class="small fs-4 fw-bold  m-0 p-0"> ({{ $user->age }} years) </div>
                                        <span>Patient ID : <span class="badge bg-secondary"> {{ 'MAP/' . $user->id }}
                                            </span>
                                            | UPN <span class="badge bg-primary">{{ $user->upn }}</span>
                                        </span>
                                        <div> Emergency Contact: <span class="fw-bold">{{ $user->emergency_contact }}</span>
                                        </div>
                                    </div>
                                </div>



                            </div>
                            <div class="col-md-8">

                                <div class="row ">
                                    <div class="col-md-6">

                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <span>Phone</span>
                                            <span class="text-warning">
                                                {{ $user->phone }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <span>Email</span>
                                            <span>
                                                {{ $user->email }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <span>UPN</span>
                                            <span>
                                                {{ $user->upn }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <span>Blood Group</span>
                                            <span class="text-warning">
                                                {{ $user->blood_group }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <span>Geno Type</span>
                                            <span>
                                                {{ $user->genotype }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between border-bottom py-2">
                                            <span>Height</span>
                                            <span>
                                                {{ $user->height }}
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-lg-12 col-md-12 col-12">
                <div class="card mb-3 ">
                    <div class="card-body">
                        <h4 class="fw-bold">Quick Actions</h4>
                        <div class="d-flex">
                            <a href="/invoice/new/{{ $user->id }}"
                                class="btn btn-dark-primary me-2 shadow-sm py-2 ">Create New Invoice</a>

                            <button class="btn btn-dark-secondary me-2 shadow-sm py-2 ">Add New Payment</button>
                            <button class="btn btn-primary shadow-sm me-2 py-2 ">Edit Patient Profile</button>
                        </div>
                    </div>
                </div>
                <div class="card rounded-3">

                    <div class="row">
                        <div class="col-md-12 mt-3 mb-4">
                            <!-- Nav -->
                            <ul class="nav" id="tab" role="tablist">
                                <li class="me-3  mx-3 ">
                                    <a class=" btn btn-secondary active" id="profile-tab" data-bs-toggle="pill"
                                        href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile
                                        Overview</a>
                                </li>
                                <li class="me-3">
                                    <a class=" btn btn-secondary" id="admission-tab" data-bs-toggle="pill" href="#admission"
                                        role="tab" aria-controls="admission" aria-selected="false">Admissions</a>
                                </li>
                                <li class="me-3">
                                    <a class=" btn btn-secondary" id="invoice-tab" data-bs-toggle="pill" href="#invoice"
                                        role="tab" aria-controls="invoice" aria-selected="false">Patient Invoices</a>
                                </li>
                                <li class="me-3 ">
                                    <a class=" btn btn-secondary" id="payments-tab" data-bs-toggle="pill" href="#payments"
                                        role="tab" aria-controls="payments" aria-selected="false">Payments</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="tab-content p-3" id="tabContent">
                            <div class="tab-pane active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            </div>
                            <!--Tab pane -->
                            <div class="tab-pane fade " id="payments" role="tabpanel" aria-labelledby="payments-tab">

                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                                                <div class="card shadow-lg " style="border: 0">
                                                    <div class="card-body">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between  lh-1">
                                                            <div>
                                                                <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                                                <span class="fs-4  fw-semi-bold">Register Payments</span>
                                                            </div>
                                                            <div>
                                                                <h2 class="fw-bold mb-1">
                                                                    {{ number_format(\App\Models\Payment::where('client_id', $user->id)->count()) }}
                                                                </h2>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                                                <div class="card shadow-lg " style="border: 0">
                                                    <div class="card-body">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between  lh-1">
                                                            <div>
                                                                <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                                                <span class="fs-4  fw-semi-bold">Total Amount</span>
                                                            </div>
                                                            <div>
                                                                <h2 class="fw-bold mb-1">
                                                                    {{ money(\App\Models\Payment::where('client_id', $user->id)->sum('amount')) }}
                                                                </h2>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <div class="table-responsive">
                                                <table class="table table-sm ">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice Number</th>
                                                            <th>Amount</th>
                                                            <th>Payment <br> Type</th>
                                                            <th>By</th>
                                                            <th>

                                                                Date
                                                            </th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>

                                                        @foreach ($payments as $pay)
                                                            <tr>


                                                                <td class="align-middle fw-bold">
                                                                    {{ $pay->invoice->invoice_number }}
                                                                </td>

                                                                <td class="align-middle fw-bold">
                                                                    {{ money($pay->amount) }}
                                                                </td>


                                                                <td class="align-middle fw-bold">
                                                                    {{ $pay->payment_type }}
                                                                </td>


                                                                <td class="align-middle fw-bold">

                                                                    <a href="#">
                                                                        <h4 class="fw-bold m-0 small p-0 text-info">
                                                                            {{ $pay->user->name }}
                                                                        </h4>
                                                                    </a>
                                                                </td>

                                                                <td>
                                                                    {{ date('j M Y', strtotime($pay->created_at)) }}
                                                                </td>

                                                                <td class="align-middle">

                                                                    <div class="d-flex justify-content-between ">
                                                                        <span> {{ $pay->ref }} </span>
                                                                        <div class="d-flex mt-1">
                                                                            <a href="/delete_payment/{{ $pay->id }}"
                                                                                class=" "
                                                                                onclick="return confirm('Payment will be deleted')">
                                                                                <span class="badge bg-danger "
                                                                                    title="deleted invoice">delete</span>
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

                            <div class="tab-pane fade " id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                                <div class="card mb-4 shadow-lg " style="border: 0">
                                                    <div class="card-body">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between  lh-1">
                                                            <div>
                                                                <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                                                <span class="fs-4  fw-semi-bold">Total Received</span>
                                                            </div>
                                                            <div>
                                                                <h2 class="fw-bold mb-1">
                                                                    {{ money(\App\Models\Payment::where('client_id', $user->id)->sum('amount')) }}
                                                                </h2>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                                <div class="card mb-4 shadow-lg " style="border: 0">
                                                    <div class="card-body">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between  lh-1">
                                                            <div>
                                                                <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                                                <span class="fs-4  fw-semi-bold">Total Payment</span>
                                                            </div>
                                                            <div>
                                                                <h2 class="fw-bold mb-1">
                                                                    {{ money(\App\Models\InvoiceSummary::where('client_id', $user->id)->sum('total')) }}
                                                                </h2>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                                                <div class="card mb-4 shadow-lg " style="border: 0">
                                                    <div class="card-body">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between  lh-1">
                                                            <div>
                                                                <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                                                <span class="fs-4  fw-semi-bold">Pending</span>
                                                            </div>
                                                            <div>
                                                                <h2 class="fw-bold mb-1">
                                                                    {{ \App\Models\InvoiceSummary::where('client_id', $user->id)->count() }}
                                                                </h2>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
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
                                                                        {{ ucfirst($invoice->client->lastname . ' ' . $invoice->client->firstname) }}
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
                                                                    <span
                                                                        class="badge bg-primary">{{ $invoice->invoice_number }}</span>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                {{ date('j M Y | h:i a', strtotime($invoice->created_at)) }}
                                                            </td>
                                                            <td class="align-middle">
                                                                <div class="d-flex justify-content-end ">
                                                                    <div class="d-flex mt-1">
                                                                        <a href="/invoice/print/{{ $invoice->id }}"
                                                                            target="blank" class="me-2">
                                                                            <i class="fe fe-printer"
                                                                                title="Print Invoice"></i>
                                                                        </a>
                                                                        <a href="javascript:;" class="text-info me-2">
                                                                            <i class="fe fe-edit"
                                                                                title="deleted invoice"></i>
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

                            <div class="tab-pane fade " id="admission" role="tabpanel" aria-labelledby="admission-tab">

                                <div class="table-responsive shadow-lg ">
                                    <table class="table table-sm ">
                                        <thead>
                                            <tr>
                                                <th>Clinical Concerns</th>
                                                <th>Vitals</th>
                                                <th>
                                                    Date
                                                </th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($admisions as $adm)
                                                <tr>

                                                    <td class="align-middle fw-bold">
                                                        <span style="white-space: normal">
                                                            {{ $adm->clinical_concerns }}
                                                        </span>
                                                    </td>



                                                    <td class="align-middle fw-bold">
                                                        <span>
                                                            {{ $adm->weight }} | {{ $adm->height }} |
                                                            {{ $adm->blood_pressure }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        {{ date('j M, Y', strtotime($adm->created_at)) }}
                                                    </td>

                                                    <td class="align-middle">

                                                        <div class="d-flex justify-content-end ">
                                                            <div class="d-flex mt-1">
                                                                <a href="/new-admision/edit/{{ $adm->id }}"
                                                                    class="text-info me-2">
                                                                    <i class="fe fe-edit" title="Edit Admission Info"></i>
                                                                </a>

                                                                <a href="javascript:;" class="text-danger ">
                                                                    <i class="fe fe-trash"
                                                                        onclick="return confirm('Admission details will be completely removed')"
                                                                        title="deleted Admission"></i>
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
            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            //$('#modify_userhours').modal('show');
        })
    </script>
@endpush
