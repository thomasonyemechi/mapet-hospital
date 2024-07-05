@extends('layout.app')
@section('page_title')
    Add Item
@endsection

@section('page_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        New Client Profile
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Client</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                New Client
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" class="row" accept="/admin/adduser">
                        @csrf
                        <div class="col-md-2 mb-3 mb-2 ">
                            <label class="form-label">Title<span class="text-danger">*</span></label>
                            <select name="title" class="form-control">
                                <option selected disabled>...</option>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Miss</option>
                            </select>
                        </div>
                        <div class="col-md-5 mb-3 mb-2 ">
                            <label class="form-label">First Name<span class="text-danger">*</span></label>
                            <input type="text" name="firstname" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-md-5 mb-3 mb-2 ">
                            <label class="form-label">Last Name<span class="text-danger">*</span></label>
                            <input type="text" name="lastname" class="form-control" placeholder="Enter last name"
                                required>
                        </div>


                        <div class="col-md-4 mb-3 mb-2 ">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" placeholder="Enter phone number">
                        </div>
                        <div class="col-md-4 mb-3 mb-2 ">
                            <label class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Enter Email Address">
                        </div>

                        <div class="col-md-2 mb-3 mb-2 ">
                            <label class="form-label">Age<span class="text-danger">*</span></label>
                            <input type="number" name="age" class="form-control" placeholder="Enter age" required>
                        </div>

                        <div class="col-md-2 mb-3 mb-2 ">
                            <label class="form-label">Gender<span class="text-danger">*</span></label>
                            <select class="form-control" name="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>


                        <div class="col-md-4 mb-3 mb-2 ">
                            <label class="form-label">organization</label>
                            <input type="text" name="organization" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4 mb-3 mb-2 ">
                            <label class="form-label">Blood Pressure</label>
                            <input type="text" name="blood_pressure" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-4 mb-3 mb-2 ">
                            <label class="form-label">Blood Group</label>
                            <input type="text" name="blood_group" class="form-control" placeholder="">
                        </div>



                        <div class="col-lg-6 mb-3 mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2"></textarea>
                        </div>
                        <div class="col-lg-6 mb-3 mt-5 pt-3  mb-3">
                            <div class="d-flex justify-content-end">
                                <button type="submit" name="registerClient" class="btn ml-2 btn-primary">Save
                                    Info</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="row">
                {{-- @foreach ($clients as $client) --}}
                <div class="col-xl-6 col-lg-6 col-sm-6">
                    <div class="card contact_list text-center">
                        <div class="card-body">

                            <div class="user-content">
                                <div class="user-info">
                                    <div class="user-img">
                                        <a href="">
                                            <img src="{{ Avatar::create('Jasper Rock')->toBase64() }}"
                                                class="rounded-circle " style="width: 35px" />
                                        </a>
                                    </div>
                                    <div class="user-details mt-2">
                                        <a href="">
                                            <h4 class="user-name text-info fw-bold mb-0">Jasper Rock</h4>
                                        </a>
                                        <span class="badge bg-secondary">09038773644</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- @endforeach --}}

            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script></script>
@endpush
