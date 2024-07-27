@extends('layout.app')
@section('page_title')
    Manage Admission
@endsection


@section('page_content')
    <div class="row">

        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        Admission
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Patient</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $client->fullname() }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>



        <div class="col-md-10 offset-1 ">

            <div class="card">
                <div class="card-body">
                    <div class="invoice-bg p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class=" mb-3 ">
                                    <h2 class="fw-bold text-white" style="font-size: 45px;">
                                        mapet Hospital
                                    </h2>

                                    <div class="d-flex justify-content-start ">
                                        <div class="mb-2 me-3" style="font-size: 15px;">
                                            <span class="invoice-bg-2 p-1" style="border-radius: 50% !important"><i
                                                    class="fe fe-user m-0 p-0 fw-bold text-m"></i></span>
                                            <span>{{ $client->fullname() }}</span>
                                        </div>

                                        <div class="mb-2" style="font-size: 15px;">
                                            <span class="invoice-bg-2 p-1" style="border-radius: 50% !important"><i
                                                    class="fe fe-phone m-0 p-0 fw-bold text-m"></i></span>
                                            <span> {{ $client->phone }} </span>
                                        </div>
                                    </div>

                                    @if ($client->address)
                                        <div class="mb-2" style="font-size: 20px;">
                                            <span class="invoice-bg-2 p-1" style="border-radius: 50% !important"><i
                                                    class="fe fe-map-pin m-0 p-0 fw-bold text-m"></i></span> <span>
                                                {{ $client->address }} </span>
                                        </div>
                                    @endif

                                </div>

                            </div>

                            <div class="col-4">
                                <div class="text-end p-1">
                                    <h2 class="fw-bold text-white" style="font-size: 30px;">
                                        Admission
                                    </h2>
                                    <h4 class="fw-bold text-m-2 m-0 p-0" style="font-size: 20px">Card</h4>
                                </div>
                            </div>


                        </div>
                    </div>


                    <div class="card mt-2">
                        <div class="card-body">
                            <form action="/update_concern" method="POST">@csrf
                                <h4 class="fw-bold text-decoration-underline">Update Clinical Concern</h4>

                                <div class="col-md-12 mt-2 mb-2 ">
                                    <textarea name="clinical_concerns" class="form-control " rows="3" id=""> {{ $admission->clinical_concerns }} </textarea>
                                    <input type="hidden" value="{{ $admission->id }}" name="id">

                                </div>

                                <div class="d-flex justify-content-end ">
                                    <button class="btn btn-sm mt-2 btn-warning">Update Clinical Concerns</button>
                                </div>
                            </form>
                        </div>
                    </div>



                    {{-- <div class="invoice-bg-2 fw-bold mb-3 p-3" style="font-size: 18px;">
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
                    </div> --}}



                    <div class="card mt-2 mb-2">
                        <div class="card-body">
                            <h4 class="fw-bold text-decoration-underline">Record Vital Signs</h4>

                            <form action="/add_vitals" method="POST"> @csrf
                                <div class="row">




                                    <div class="col-md-3 mb-3 mb-2 ">
                                        <label class="form-label">Blood Pressure</label>
                                        <input type="text" name="blood_pressure" value="{{ old('blood_pressure') }}"
                                            class="form-control form-control-sm" placeholder="">
                                        <input type="hidden" value="{{ $admission->id }}" name="admission_id">
                                    </div>

                                    <div class="col-md-2 mb-3 mb-2 ">
                                        <label class="form-label">temperature</label>
                                        <input type="text" name="temperature" value="{{ old('temperature') }}"
                                            class="form-control form-control-sm" placeholder="">
                                    </div>


                                    <div class="col-md-3 mb-3 mb-2 ">
                                        <label class="form-label">Pulse rate</label>
                                        <input type="text" name="pulse_rate" value="{{ old('pulse_rate') }}"
                                            class="form-control form-control-sm" placeholder="">
                                    </div>


                                    <div class="col-md-4 mb-3 mb-2 ">
                                        <div class="row">
                                            <div class="col-md-6">
                                                    <label class="form-label">Respiration rate</label>
                                                    <input type="text" name="respiration_rate"
                                                        value="{{ old('respiration_rate') }}"
                                                        class="form-control form-control-sm w-100" placeholder="">
                                            </div>


                                            <div class="col-md-6">
                                                    <label class="form-label">Oxygen Rate </label>
                                                    <input type="text" name="oxygen_rate"
                                                        value="{{ old('oxygen_rate') }}"
                                                        class="form-control form-control-sm w-100" placeholder="">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="d-flex justify-content-end ">
                                        <button class="btn btn-sm mt-2 btn-warning">Save Vital Signs </button>
                                    </div>



                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="">

                    </div>

                    <div class="table-responsive shadow-lg mt-3 " style="border-radius: 5px;">
                        <table class="table table-bordered table-sm mb-0  invoice-table  ">
                            <thead class="invoice-bg">
                                <tr>
                                    <th>Heart <br> Rate </th>
                                    <th>Blood <br> Pressure</th>
                                    <th>Temperature</th>
                                    <th>Respiration <br> Rate </th>
                                    <th> Time</th>
                                    <th> Added <br> by </th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody class="cart_list">
                                @foreach ($vitals as $vital)
                                    <tr>
                                        <td class="align-middle">
                                            <h4 class="fw-bold fs-5 m-0 p-0"> {{ $vital->pulse_rate }}
                                            </h4>
                                        </td>

                                        <td class="align-middle">
                                            <h4 class="fw-bold fs-5 m-0 p-0"> {{ $vital->blood_pressure }}
                                            </h4>
                                        </td>
                                        <td class="align-middle">
                                            <h4 class="fw-bold fs-5 m-0 p-0"> {{ $vital->temperature }}
                                            </h4>
                                        </td>
                                        <td class="align-middle">
                                            <h4 class="fw-bold fs-5 m-0 p-0"> {{ $vital->respiration_rate }}
                                            </h4>
                                        </td>
                                        <td class="align-middle">
                                            <h4 class="fw-bold fs-5 m-0 p-0"> {{ $vital->date }}
                                            </h4>
                                        </td>
                                        <td class="align-middle">
                                            <h4 class="fw-bold fs-5 m-0 p-0"> {{ $vital->user->name }}
                                            </h4>
                                        </td>

                                        <td>
                                            <div class="d-flex justify-content-end ">
                                                <div class="d-flex mt-1">


                                                    <a href="/delete_vital/{{ $vital->id }}"
                                                        class="text-danger me-2 ">
                                                        <i class="fe fe-trash"
                                                            onclick="return confirm('details will be completely removed')"
                                                            title="deleted info"></i>
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



@push('scripts')
@endpush
