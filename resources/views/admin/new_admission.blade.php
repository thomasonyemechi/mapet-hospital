@extends('layout.app')
@section('page_title')
    Admissions
@endsection

@section('page_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        Admissions
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Patient</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Admissions
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>



        <div class="col-md-10 offset-lg-1 ">

            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <span class="input-group-text py-1 px-2 bg-success text-white fw-bold w-100"
                                id="basic-addon3">Select
                                Client Or Add New Client Blelow </span>

                        </div>
                        <div class="col-9">
                            @include('pos.search_client')
                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-body">
                    <form method="POST" class="row" accept="/new-admission">
                        @csrf
                        <div class="col-md-12">
                            <div class="card mb-2 ">
                                <div class="card-body">
                                    <h4 class="fw-bold p-0 text-decoration-underline  ">Patient Details</h4>

                                    <div class="row">
                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Arrival Date & Time</label>
                                            <input type="datetime-local" name="arrival_date_time"
                                                value="{{ old('arrival_date_time') }}" class="form-control" placeholder="">
                                            <input type="hidden" name="client_id" value="{{ $client->id ?? '' }}">
                                        </div>


                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4 mb-3 mb-2 ">
                                                    <label class="form-label">First Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="firstname"
                                                        value="{{ $client->firstname ?? old('firstname') }}"
                                                        class="form-control" placeholder="First Name" required>
                                                    @error('firstname')
                                                        <span class="small text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3 mb-2 ">
                                                    <label class="form-label">Last Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="lastname"
                                                        value="{{ $client->lastname ?? old('lastname') }}"
                                                        class="form-control" placeholder="Enter last name" required>
                                                    @error('lastname')
                                                        <span class="small text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 mb-3 mb-2 ">
                                                    <label class="form-label">Other Names<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="other_names"
                                                        value="{{ $client->other_names ?? old('other_names') }}"
                                                        class="form-control" placeholder="other names">
                                                    @error('other_names')
                                                        <span class="small text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">UPN<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control "
                                                value="{{ $client->upn ?? old('upn') }}" name="upn">
                                        </div>


                                        <div class="col-md-4 mb-3 mb-2 ">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Enter phone number"
                                                value="{{ $client->phone ?? old('phone') }}">
                                            @error('phone')
                                                <span class="small text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-5">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Age<span class="text-danger">*</span></label>
                                                    <input type="number" name="age" class="form-control"
                                                        value="{{ $client->age ?? old('age') }}" placeholder="Enter age"
                                                        required>
                                                    @error('age')
                                                        <span class="small text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Gender<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-control" name="gender">
                                                        @if (isset($client->gender))
                                                            <option> {{ $client->gender }} </option>
                                                        @endif
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="fw-bold text-decoration-underline">Other Details</h4>

                                    <div class="row">

                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Blood Group</label>
                                            <input type="text" name="blood_group"
                                                value="{{ $client->blood_group ?? old('blood_group') }}"
                                                class="form-control" placeholder="">
                                        </div>



                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Genotype</label>
                                            <input type="text" name="genoytpe"
                                                value="{{ $client->genotype ?? old('genoytpe') }}" class="form-control"
                                                placeholder="">
                                        </div>


                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Blood Pressure</label>
                                            <input type="text" name="blood_pressure"
                                                value="{{ old('blood_pressure') }}" class="form-control" placeholder="">
                                        </div>



                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Weight</label>
                                            <input type="text" name="weight" value="{{ old('weight') }}"
                                                class="form-control" placeholder="">
                                        </div>

                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Height</label>
                                            <input type="text" name="height" value="{{ old('height') }}"
                                                class="form-control" placeholder="">
                                        </div>


                                        
                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">temperature</label>
                                            <input type="text" name="temperature" value="{{ old('temperature') }}"
                                                class="form-control" placeholder="">
                                        </div>

                                                                 
                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Pulse rate</label>
                                            <input type="text" name="pulse_rate" value="{{ old('pulse_rate') }}"
                                                class="form-control" placeholder="">
                                        </div>


                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Respiration rate</label>
                                            <input type="text" name="respiration_rate" value="{{ old('respiration_rate') }}"
                                                class="form-control" placeholder="">
                                        </div>



                                        <div class="col-md-12 mb-3 mb-2 ">
                                            <label class="form-label">Clinical Concerns</label>
                                            <textarea name="clinical_concerns" class="form-control" rows="3" id=""></textarea>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <button class="btn btn-primary w-100">
                                Register Admission
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script></script>
@endpush
