<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="{{ asset('assets/fonts/feather/feather.css') }}" rel="stylesheet" />



    <link rel="stylesheet" href="{{ asset('assets/css/theme.min.css') }}">
    <title>Print Invoice</title>
    @laravelPWA

    <style>
        /* 41b1be */
        .invoice-table {
            border: 2px solid #212659 !important;
        }

        .invoice-bg {
            background-color: #212659;
            color: white;
        }



        .invoice-bg-2 {
            background-color: #41b1be;
            color: white;
        }


        .text-m {
            color: #212659;
        }

        .text-m-2 {
            color: #41b1be;
        }
    </style>

</head>

<body>


    @php
        $client = $summary->client;
    @endphp



    <div class="m-3">
        <div class="row">


            <div class="col-md-12">





                <div class="card">
                    <div class="card-body">
                        <div class="invoice-bg p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class=" mb-3 ">
                                        <h2 class="fw-bold text-white" style="font-size: 90px;">
                                            mapet
                                        </h2>

                                        <div class="mb-2" style="font-size: 20px;">
                                            <span class="invoice-bg-2 p-1" style="border-radius: 50% !important"><i
                                                    class="fe fe-phone m-0 p-0 fw-bold text-m"></i></span>
                                            <span>07026614356 /
                                                09167860517</span>
                                        </div>


                                        <div class="mb-2" style="font-size: 20px;">
                                            <span class="invoice-bg-2 p-1" style="border-radius: 50% !important"><i
                                                    class="fe fe-map-pin m-0 p-0 fw-bold text-m"></i></span> <span>25
                                                ibikunle lane, idi-agba tuntun, opposite st. luke, akure</span>
                                        </div>
                                        <div class="mb-2" style="font-size: 20px;">
                                            <span class="invoice-bg-2 p-1" style="border-radius: 50% !important"><i
                                                    class="fe fe-mail m-0 p-0 fw-bold text-m"></i></span>
                                            <span>info@mapetfoundationhospital</span>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-4">
                                    <div class=" mt-5 text-end p-3">
                                        <h2 class="fw-bold text-white" style="font-size: 60px;">
                                            INVOICE
                                        </h2>
                                        <h4 class="fw-bold text-m-2 m-0 p-0" style="font-size: 40px;">PATIENT</h4>
                                    </div>
                                </div>


                            </div>
                        </div>



                        <div class="invoice-bg-2 fw-bold mb-3 p-3" style="font-size: 18px;">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex text-m justify-content-between ">
                                        <span>Date:</span>
                                        <span> {{ date('j M Y ', strtotime($summary->created_at)) }}</span>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="d-flex text-m justify-content-between ">
                                        <span>Invoice:</span>
                                        <span> {{ $summary->invoice_number }} </span>
                                    </div>
                                </div>

                            </div>
                        </div>



                        <div class="row">


                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="fw-bold" style="text-decoration: underline">Patient Details</h4>
                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Full Name</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold"> {{ $client->lastname . ' ' . $client->lastname }}
                                                </span>

                                            </div>
                                        </div>


                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>UPN</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold"> {{ $client->upn }} </span>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Age</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold"> {{ $client->age }} </span>

                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Address</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold"> {{ $client->address }} </span>

                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Phone</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold"> {{ $client->phone }} </span>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Email</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold"> {{ $client->email }} </span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="fw-bold" style="text-decoration: underline">Hospital Details</h4>
                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Doctor</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold"> {{ $summary->doctor->name }} </span>

                                            </div>
                                        </div>


                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Bed No</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold">{{ $summary->bed }}</span>

                                            </div>
                                        </div>

                                        <div class="row mb-4">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Admission Date</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold">
                                                    {{ $summary->admission_date ? date('j M Y ', strtotime($summary->admission_date)) : ' ' }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-4">
                                                <div class="d-flex justify-content-between">
                                                    <span>Discharge Date</span> <span>:</span>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <span class="fw-bold">
                                                    {{ $summary->discharge_date ? date('j M Y ', strtotime($summary->discharge_date)) : ' ' }}</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="table-responsive shadow-lg mt-3 " style="border-radius: 5px;">
                            <table class="table table-bordered table-sm mb-0  invoice-table  ">
                                <thead class="invoice-bg">
                                    <tr>
                                        <th>Hospital Service</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>
                                            <div class="d-flex justify-content-end">
                                                Amount
                                            </div>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="cart_list">
                                    @foreach ($summary->items as $item)
                                        <tr>
                                            <td class="align-middle">
                                                <a href="javascript:;">
                                                    <h4 class="fw-bold m-0 p-0 text-info"> {{ $item->item_name }}
                                                    </h4>
                                                </a>
                                            </td>
                                            <td class="align-middle">
                                                <h3 class="fw-bold  fs-4 text-m m-0 p-0">
                                                    {{ $item->qty }} </h3>
                                            </td>
                                            <td class="align-middle">
                                                <span class="fw-bold fs-4 text-m m-0 p-0">
                                                    {{ money($item->rate) }} </span>
                                            </td>
                                            <td>
                                                <div class="d-flex justify-content-end">
                                                    <span class="fw-bold fs-4 text-dark   mt-1">
                                                        {{ money($item->rate * $item->qty) }} </span>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                        <div class="table-responsive shadow-lg mt-3 " style="border-radius: 5px;">
                            <table class="table table-bordered mb-0 invoice-table table-sm ">
                                <thead class="invoice-bg">
                                    <tr>
                                        <th>Total Amount</th>
                                        <th>Initial Deposit</th>
                                        <th>Outstanding Balance</th>
                                        <th>30days</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <tr>
                                        <td class="align-middle">
                                            <h3 class="fs-3 fw-bold text-m m-0 p-0"> {{ money($summary->total) }}
                                            </h3>
                                        </td>

                                        <td>
                                            <h3 class="fs-3 fw-bold text-m m-0 p-0">
                                                {{ money($summary->initial_deposit) }} </h3>
                                        </td>
                                        <td>
                                            <h3 class="fs-3 fw-bold text-m m-0 p-0">
                                                {{ money($summary->outstanding_balance) }} </h3>
                                        </td>
                                        <td>
                                            <h3 class="fs-3 fw-bold text-m m-0 p-0">{{ $summary->days }} </h3>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>

                        </div>
                        <div class="invoice-bg mt-3 p-3">
                            <div class="row">
                                <div class="col-8">
                                    <div class="card mb-3 ">
                                        <div class="card-body">
                                            <h4 class="text-m text-center"> Please make transfers to this account </h4>
                                            <h3 class="text-center text-m fw-bold">
                                                507295392
                                                <br>
                                                MONIPOINT
                                                <br>
                                                Mapet Optical Services
                                            </h3>

                                        </div>
                                    </div>

                                    <i class="text-white">
                                        Thanks for you business
                                    </i>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="fw-bold text-m text-center">
                                                Any cash payment should <br> be made at the hospital <br>reception desk,
                                                where you will <br> receive asigned receipt
                                            </h3>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/theme.min.js') }}"></script>


</body>

</html>
