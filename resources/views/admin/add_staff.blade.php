@extends('layout.admin')
@section('page_title')
    Manage Staffs
@endsection

@section('page_content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            Manage Staff
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Manage Staff</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Staff Overview
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nav btn-group" role="tablist">
                        
                    </div>
                </div>
            </div>



            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                                <div class="card mb-4 shadow-lg " style="border: 0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between  lh-1">
                                            <div>
                                                <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                                <span class="fs-4  fw-semi-bold">Staffs</span>
                                            </div>
                                            <div>
                                                <h2 class="fw-bold mb-1">
                                                    {{ \App\Models\User::count(); }}
                                                </h2>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 col-12">
                                <div class="card mb-4 shadow-lg " style="border: 0">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between  lh-1">
                                            <div>
                                                <span class="fe fe-shopping-bag fs-4 text-primary"></span>

                                                <span class="fs-4  fw-semi-bold">Departments</span>
                                            </div>
                                            <div>
                                                <h2 class="fw-bold mb-1">
                                                    {{ \App\Models\Department::count(); }}
                                                </h2>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="d-flex">
                                    <a type="button" href="/admin/department"
                                        class="btn btn-light add_item me-2 btn-sm py-2 btn-block">
                                        <i class="fe fe-credit-card"> </i> Manage Departments
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

                        <h5 class="mb-0 fs-4 fw-bold mb-2">Create Staff Profile</h5>

                        <form action="/admin/add_staff" method="post"> @csrf
                            <div class="row">
                                <div class="col-xl-4 col-sm-6">
                                    <div class="mb-3">
                                        <label class="form-label text-primary">Name<span class="required">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control form-control-sm" placeholder="Jasper Jackson">

                                        @error('name')
                                            <span class="text-danger small"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary">Role<span class="required">*</span></label>
                                        <select name="role" class="form-control form-control-sm">
                                            <option>Administrator</option>
                                            <option>Member</option>
                                            <option>Intenship</option>
                                        </select>
                                        @error('role')
                                            <span class="text-danger small"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                </div>


                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary">Department<span
                                                class="required">*</span></label>
                                        <select name="department" class="form-control form-control-sm">
                                            <option selected disabled >...Selected department...</option>
                                            @foreach ($departments as $dept)
                                                <option value="{{ $dept->id }}">{{ $dept->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('department')
                                            <span class="text-danger small"> {{ $message }} </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-xl-4 col-sm-4">

                                    <div class="mb-3">
                                        <label class="form-label text-primary">Email<span class="required">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-sm" placeholder="hello@example.com">
                                        @error('email')
                                            <span class="text-danger small"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>



                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary">Phone
                                            Number<span class="required  tex-danger">*</span></label>
                                        <input type="number" name="phone" value="{{ old('phone') }}"
                                            class="form-control form-control-sm" placeholder="0800000000">
                                        @error('phone')
                                            <span class="text-danger small"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="col-xl-4">
                                    <div class="mb-3">
                                        <label class="form-label text-primary">Address<span
                                                class="required  tex-danger">*</span></label>
                                        <input type="text" name="address" value="{{ old('address') }}"
                                            class="form-control form-control-sm" placeholder="home address">
                                        @error('address')
                                            <span class="text-danger small"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="col-xl-12 col-sm-6">
                                <div class="d-flex justify-content-end ">
                                    <button class="btn btn-primary btn-sm">Create Profile</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            @foreach ($staffs as $staff)
                <div class="col-xl-3 col-lg-4 mb-2 col-sm-6">
                    <div class="card contact_list text-center">
                        <div class="card-body">
                            <div class="user-content">
                                <div class="user-info">
                                    <div class="user-img">
                                        <img src="{{ Avatar::create($staff->name)->toBase64() }}" class="rounded-circle "
                                            style="width: 50px" />
                                    </div>
                                    <div class="user-details mt-2">
                                        <h4 class="user-name fw-bold text-dark-warning mb-0">{{ $staff->name }}</h4>
                                        <p> {{ $staff->department->title ?? ''}} {{  ($staff->role) ? $staff->role : '.' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-icon  mb-2 mt-0">
                                <span class="badge bg-success light">{{ $staff->phone }}</span>
                                <span
                                    class="badge bg-danger light">{{ date('j M, Y', strtotime($staff->created_at)) }}</span>
                            </div>
                            <div class="d-flex justify-content-center ">
                                <a href="/admin/staff/{{ $staff->id }}" class=" fw-bold w-50 me-2"><i
                                        class="fa fa-user small me-2"></i>profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-md-12">
                <div class="d-flex justify-content-end">
                    {{ $staffs->links('pagination::bootstrap-4') }}
                </div>
            </div>

        </div>
    </div>
@endsection


@push('scripts')
    <script src="{{ asset('assets/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js') }}"></script>

    <script>
        $(function() {

        })
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
        $('.remove-img').on('click', function() {
            var imageUrl = "assets/images/no-img-avatar.png";
            $('.avatar-preview, #imagePreview').removeAttr('style');
            $('#imagePreview').css('background-image', 'url(' + imageUrl + ')');
        });
    </script>
@endpush
