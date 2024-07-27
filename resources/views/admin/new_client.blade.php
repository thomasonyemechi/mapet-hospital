@extends('layout.app')
@section('page_title')
    Manage Client
@endsection

@section('page_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        New Patient Profile
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Patient</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                New Patient
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="row" accept="/admin/client/new-client">
                        @csrf
                        <div class="col-md-12">
                            <div class="card mb-2 ">
                                <div class="card-body">
                                    <h4 class="fw-bold p-0 text-decoration-underline  ">Patient Details</h4>

                                    <div class="row">
                                        <div class="col-md-2 mb-3 mb-2 ">
                                            <label class="form-label">Title<span class="text-danger">*</span></label>
                                            <select name="title" class="form-control">
                                                <option selected disabled>...</option>
                                                <option>Mr</option>
                                                <option>Mrs</option>
                                                <option>Miss</option>
                                            </select>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4 mb-3 mb-2 ">
                                                    <label class="form-label">First Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="firstname" value="{{ old('firstname') }}"
                                                        class="form-control" placeholder="First Name" required>
                                                    @error('firstname')
                                                        <span class="small text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4 mb-3 mb-2 ">
                                                    <label class="form-label">Last Name<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="lastname" value="{{ old('lastname') }}"
                                                        class="form-control" placeholder="Enter last name" required>
                                                    @error('lastname')
                                                        <span class="small text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-4 mb-3 mb-2 ">
                                                    <label class="form-label">Other Names<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="other_names"
                                                        value="{{ old('other_names') }}" class="form-control"
                                                        placeholder="other names" required>
                                                    @error('other_names')
                                                        <span class="small text-danger">{{ $message }} </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-md-2 mb-3 mb-2 ">
                                            <label class="form-label">UPN<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control " value="{{ old('upn') }}"
                                                name="upn">
                                        </div>


                                        <div class="col-md-4 mb-3 mb-2 ">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control"
                                                placeholder="Enter phone number" value="{{ old('phone') }}">
                                            @error('phone')
                                                <span class="small text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3 mb-2 ">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control"
                                                value="{{ old('email') }}" placeholder="Enter Email Address">
                                            @error('email')
                                                <span class="small text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-2 mb-3 mb-2 ">
                                            <label class="form-label">Age<span class="text-danger">*</span></label>
                                            <input type="number" name="age" class="form-control"
                                                value="{{ old('age') }}" placeholder="Enter age" required>
                                            @error('age')
                                                <span class="small text-danger">{{ $message }} </span>
                                            @enderror
                                        </div>

                                        <div class="col-md-2 mb-3 mb-2 ">
                                            <label class="form-label">Gender<span class="text-danger">*</span></label>
                                            <select class="form-control" name="gender">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>


                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">organization</label>
                                            <input type="text" name="organization" {{ old('organization') }}
                                                class="form-control" placeholder="">
                                        </div>




                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">LGA</label>
                                            <input type="text" name="lga" value="{{ old('lga') }}"
                                                class="form-control" placeholder="">
                                        </div>




                                        <div class="col-md-4 mb-3 mb-2 ">
                                            <label class="form-label">How did you hear about us </label>
                                            <select name="" class="form-control" id="">
                                                <option>Family/Friend Recomendation</option>
                                                <option>Social Media / Online</option>
                                                <option>Victri Outreach</option>
                                                <option>Referral Through medical Prefessional</option>
                                                <option>Referral from a pharmacy</option>
                                                <option> Beneficiary Staff Member</option>
                                                <option>NHIS/HMO Programs</option>
                                                <option>Others</option>
                                            </select>
                                        </div>

                                        <div class="col-lg-12 mb-3 mb-3">
                                            <label class="form-label">Home Address</label>
                                            <textarea name="address" class="form-control" rows="1"> {{ old('address') }} </textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="fw-bold text-decoration-underline">Emergency Contact</h4>

                                    <div class="row">
                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Surname</label>
                                            <input type="text" name="emergency_surname"
                                                value="{{ old('emergency_surname') }}" class="form-control"
                                                placeholder="">
                                        </div>
                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Firstname</label>
                                            <input type="text" name="emergency_firstname"
                                                value="{{ old('emergency_firstname') }}" class="form-control"
                                                placeholder="">
                                        </div>


                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Contact</label>
                                            <input type="text" name="emergency_contact" value="{{ old('address') }}"
                                                class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-3 mb-3 mb-2 ">
                                            <label class="form-label">Relationship to Patient</label>
                                            <input type="text" name="relationship" value="{{ old('relationship') }}"
                                                class="form-control" placeholder="">
                                        </div>


                                    </div>

                                </div>
                            </div>


                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="fw-bold text-decoration-underline">Card Type</h4>

                                    <div class="row">
                                        <div class="d-flex justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="card_type"
                                                    id="flexRadioDefault1" name="single" checked>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Single
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="card_type"
                                                    id="flexRadioDefault2" value="family">
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Family
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="card_type"
                                                    id="flexRadioDefault3" value="maternity">
                                                <label class="form-check-label" for="flexRadioDefault3">
                                                    Maternity
                                                </label>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>


                            <div class="card mb-2">
                                <div class="card-body">
                                    <h4 class="fw-bold text-decoration-underline">Other Details</h4>

                                    <div class="row">

                                        <div class="col-md-2 mb-3 mb-2 ">
                                            <label class="form-label">Blood Group</label>
                                            <input type="text" name="blood_group" value="{{ old('blood_group') }}"
                                                class="form-control" placeholder="">
                                        </div>

                                        <div class="col-md-2 mb-3 mb-2 ">
                                            <label class="form-label">Genotype</label>
                                            <input type="text" name="genoytpe" value="{{ old('genoytpe') }}"
                                                class="form-control" placeholder="">
                                        </div>



                                    </div>

                                </div>
                            </div>

                            <button class="btn btn-primary w-100">
                                Create Patient Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="row">
                @foreach ($clients as $client)
                    <div class="col-xl-6 col-lg-6 col-sm-6">
                        <div class="card contact_list mb-2 text-center">
                            <div class="card-body">

                                <div class="user-content">
                                    <div class="user-info">
                                        <div class="user-img">
                                            <a href="{{ $client->id }}">
                                                <img src="{{ Avatar::create($client->lastname . ' ' . $client->firstname)->toBase64() }}"
                                                    class="rounded-circle " style="width: 35px" />
                                            </a>
                                        </div>
                                        <div class="user-details mt-2">
                                            <a href="/client/{{ $client->id }}">
                                                <h4 class="user-name text-info fw-bold mb-0">
                                                    {{ $client->lastname . ' ' . $client->firstname }} </h4>
                                            </a>
                                            <span class="badge bg-secondary">{{ $client->phone }}</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script></script>
@endpush
