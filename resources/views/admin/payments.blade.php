@extends('layout.app')
@section('page_title')
    Manage Invoices Payments
@endsection


@section('page_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        Invoices Payments
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Invoices Payments
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="d-flex">

                </div>


            </div>
        </div>



        <div class="col-12">

            <div class="card mb-3">
                <div class="card-body">
                    <h4 class="fw-bold">Regsiter New Payment</h4>
                    <form action="/register_payment" method="post">@csrf
                        <div class="row">
                            <div class="col-md-2 mb-3 mb-2 ">
                                <label class="form-label">Invoice Number <span class="text-danger">*</span> </label>
                                <input type="text" name="invoice_number" value="{{ old('invoice_number') }}"
                                    placeholder="enter invoice number " class="form-control">

                                @error('invoice_number')
                                    <span class="text-dnager small"> {{ $message }} </span>
                                @enderror
                            </div>


                            <div class="col-md-2 mb-3 mb-2 ">
                                <label class="form-label">Total Amount <span class="text-danger">*</span> </label>
                                <input type="text" name="total" value="{{ old('total') }}" placeholder=" " readonly
                                    class="form-control">

                                @error('total')
                                    <span class="text-dnager small"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="col-md-2 mb-3 mb-2 ">
                                <label class="form-label">Paid <span class="text-danger">*</span> </label>
                                <input type="text" name="paid" placeholder=" " class="form-control" readonly>
                            </div>

                            <div class="col-md-2 mb-3 mb-2 ">
                                <label class="form-label">Amount <span class="text-danger">*</span> </label>

                                <input type="number" class="form-control" name="amount" value="{{ old('amount') }}">

                                @error('amount')
                                    <span class="text-dnager small"> {{ $message }} </span>
                                @enderror
                            </div>

                            <div class="col-md-2 mb-3 mb-2 ">
                                <label class="form-label">Payment Type <span class="text-danger">*</span> </label>
                                <select name="payment_type" class="form-control" required>
                                    <option selected disabled></option>
                                    <option> Pos </option>
                                    <option> Cash </option>
                                    <option> Transfer </option>
                                    <option> Cheque Book </option>
                                </select>

                                @error('payment_type')
                                    <span class="text-dnager small"> {{ $message }} </span>
                                @enderror
                            </div>


                            <div class="col-md-2 mb-3 mb-2 ">
                                <label class="form-label">Ref <span class="text-danger">*</span> </label>
                                <input type="text" name="ref" value="{{ old('rf') }}" placeholder=" "
                                    class="form-control">

                                @error('ref')
                                    <span class="text-dnager small"> {{ $message }} </span>
                                @enderror
                            </div>


                            <div class="col-md-12">
                                <div class="d-flex justify-content-end ">
                                    <button class="btn btn-primary">Register Payment</button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                            <div class="card shadow-lg " style="border: 0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between  lh-1">
                                        <div>
                                            <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                            <span class="fs-4  fw-semi-bold">Register Payments</span>
                                        </div>
                                        <div>
                                            <h2 class="fw-bold mb-1">
                                                {{ number_format(\App\Models\Payment::count()) }}
                                            </h2>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                            <div class="card shadow-lg " style="border: 0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between  lh-1">
                                        <div>
                                            <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                            <span class="fs-4  fw-semi-bold">Today's Payment</span>
                                        </div>
                                        <div>
                                            <h2 class="fw-bold mb-1">
                                                {{ money($today_pay) }}
                                            </h2>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-lg-6 col-md-12 col-12">
                            <div class="card shadow-lg " style="border: 0">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between  lh-1">
                                        <div>
                                            <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                            <span class="fs-4  fw-semi-bold">Total Amount</span>
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
                    </div>
                </div>
            </div>
        </div>



        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <h4 class="card-title fw-bold">Payments</h4>
                    </div>

                    <div class="table-responsive shadow-lg ">
                        <table class="table table-sm ">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
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
                                        <td class="align-middle">
                                            <a href="/client/{{ $pay->client->id }}">
                                                <h4 class="fw-bold m-0 small p-0 text-info">
                                                    {{ $pay->client->lastname . ' ' . $pay->client->firstname }}
                                                </h4>
                                            </a>
                                        </td>

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
                                                    <a href="/delete_payment/{{ $pay->id }}" class=" "
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
                    <div class="d-flex justify-content-end mt-3 ">
                        {{ $payments->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection



@push('scripts')
    <script>
        $(function() {
            $('input[name="invoice_number"]').on('change', function() {
                invoice = $(this).val();
                $.ajax({
                    method: 'get',
                    url: `/search_invoice/${invoice}`
                }).done(function(res) {

                    $('input[name="total"]').val(res.total)
                    $('input[name="paid"]').val(res.total_paid)
                    $('input[name="amount"]').val(res.total - res.total_paid)
                    console.log(res);
                })
            })
        })
    </script>
@endpush
