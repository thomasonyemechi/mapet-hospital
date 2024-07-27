@extends('layout.admin')
@section('page_title')
    Add New Staff
@endsection

@section('page_content')
    <div class="col-xl-12">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h1 class="mb-1 h2 fw-bold">
                            Departments
                        </h1>
                        <!-- Breadcrumb  -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Staffs</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Departments
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="nav btn-group" role="tablist">

                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <h5 class="mb-0 fs-4 fw-bold mb-2">Create Department</h5>

                        <form action="/admin/create_department" method="post"> @csrf
                            <div class="row">
                                <div class="col-xl-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label text-primary">Title<span class="required">*</span></label>
                                        <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control form-control-sm"
                                            placeholder="Dermatology, Gastroenterology etc">

                                        @error('title')
                                            <span class="text-danger small"> {{ $message }} </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-12 col-sm-6">
                                <div class="d-flex justify-content-end ">
                                    <button class="btn btn-primary btn-sm">Create Department</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mt-3">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <h4 class="card-title fw-bold">Departments</h4>
                        </div>

                        <div class="table-responsive shadow-lg ">
                            <table class="table table-sm mb-0 ">
                                <thead>
                                    <tr>
                                        <th>Department Name</th>
                                        <th>Members </th>
                                        <th>By </th>
                                        <th>Created Date </th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($departments as $dept)
                                        <tr>
                                            <td class="align-middle">
                                                <a href="javascript:;">
                                                    <h4 class="fw-bold small m-0 p-0 text-info"> {{ $dept->title }} </h4>
                                                </a>
                                            </td>

                                            <td class="align-middle">0</td>
                                            <td class="align-middle">{{ $dept->user->name }} </td>
                                            <td class="align-middle"> {{ date('j M, Y | h:m a', strtotime($dept->created_at)) }}</td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-end ">
                                                    {{-- <button class="btn py-0  mx-2 px-1 btn-info">edit</button> --}}
                                                    <a href='/admin/delete_department/{{ $dept->id }}' class="text-danger"> <i class="fa fa-trash" ></i> </a>
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
@endsection


@push('scripts')
@endpush
