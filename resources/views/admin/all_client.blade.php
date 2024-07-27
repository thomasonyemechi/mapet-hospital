@extends('layout.app')
@section('page_title')
    Patient
@endsection

@section('page_content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        All Client
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Client</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                client list
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="row">
                @foreach ($clients as $client)
                <div class="col-xl-3 col-lg-4 mb-2 col-sm-6">
                    <div class="card contact_list text-center">
                        <div class="card-body">
                            <div class="user-content">
                                <div class="user-info">
                                    <div class="user-img">
                                        <img src="{{ Avatar::create($client->lastname.' '.$client->firstname)->toBase64() }}" class="rounded-circle "
                                            style="width: 50px" />
                                    </div>
                                    <div class="user-details mt-2">
                                        <h4 class="user-name fw-bold text-dark-warning mb-0">{{$client->lastname.' '.$client->firstname}}</h4>
                                        <p> {{ $client->address ?? 'no address' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-icon  mb-2 mt-0">
                                <span class="badge bg-success light">{{ $client->phone }}</span>
                                <span
                                    class="badge bg-danger light">{{ date('j M, Y', strtotime($client->created_at)) }}</span>
                            </div>
                            <div class="d-flex justify-content-center ">
                                <a href="/client/{{ $client->id }}" class=" fw-bold w-50 me-2"><i
                                        class="fa fa-user small me-2"></i>profile</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="d-flex mt-3 justify-content-end ">
                    {{ $clients->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script></script>
@endpush
