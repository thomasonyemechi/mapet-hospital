@extends('layout.app')
@section('page_title')
    Manage Admissions
@endsection


@section('page_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        Manage Admissions
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Manage Admissions
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
                    <a href="#" class="btn btn-warning">Check</a>
                </div>


            </div>
        </div>



        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex">
                                <a type="button" href="/new-admission"
                                    class="btn btn-light add_item me-2 btn-sm py-2 btn-block">
                                    <i class="fe fe-plus-circle"> </i> Regsiter New Admission
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
                        <h4 class="card-title fw-bold">Admssion List</h4>
                    </div>

                    <div class="table-responsive shadow-lg ">
                        <table class="table table-sm ">
                            <thead>
                                <tr>
                                    <th>Patient Name</th>
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
                                        <td class="align-middle">
                                            <a href="/client/{{ $adm->client->id }}">
                                                <h4 class="fw-bold m-0 p-0 text-info">
                                                    {{ ucfirst(strtolower($adm->client->lastname . ' ' . $adm->client->firstname)) }}
                                                </h4>
                                            </a>
                                        </td>

                                        <td class="align-middle fw-bold">
                                            <span style="white-space: normal">
                                                {{ $adm->clinical_concerns }}
                                            </span>
                                        </td>


                                        <td class="align-middle fw-bold">
                                            <span>
                                                {{ $adm->weight }} | {{ $adm->height }} | {{ $adm->blood_pressure }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ date('j M Y | h:i a', strtotime($adm->created_at)) }}
                                        </td>

                                        <td class="align-middle">

                                            <div class="d-flex justify-content-end ">
                                                <div class="d-flex mt-1">
                                      
                                                    <a href="/admission/{{ $adm->id }}" class=" badge bg-info ">
                                                        Manage
                                                    </a>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>



                    <div class="d-flex mt-3 justify-content-end ">
                        {{ $admisions->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
