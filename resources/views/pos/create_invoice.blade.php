@extends('layout.app')
@section('page_title')
    Create New Invoice
@endsection


@section('page_content')
    <style>
        /* 41b1be */
        .invoice-table {
            border: 2px solid #212659 !important;
        }

        .invoice-bg {
            background-color: #212659;
            color: white;
        }
    </style>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        Invoice
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Invoice</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Create New Invoice
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>



        <div class="col-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <span class="input-group-text py-1 px-2 bg-success text-white fw-bold w-100"
                                id="basic-addon3">Select
                                Client Or Add New Client Blelow </span>

                        </div>
                        <div class="col-7">
                            @include('pos.search_client')
                        </div>

                        <div class="col-2">
                            <input type="text" name="invoice_number" placeholder="Invoice Number"
                                class="form-control w-100 py-1">
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-md-12">
            <div class="card">
                <div class="card-body">


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
                                            <input type="text" name="name" value="{{ $client->name ?? old('name') }}"
                                                class=" form-control px-2 me-2 py-0 p-0 w-100" placeholder="Patient Name">
                                        </div>
                                    </div>


                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                <span>UPN</span> <span>:</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="upn" value="{{ $client->upn ?? old('upn') }}"
                                                class=" form-control px-2 me-2 py-0 p-0 w-100" placeholder="Enter UPN">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                <span>Age</span> <span>:</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="number" name="age" value="{{ $client->age ?? old('age') }}"
                                                class=" form-control px-2 me-2 py-0 p-0 w-100" placeholder="Patient Age">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                <span>Address</span> <span>:</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="address"
                                                value="{{ $client->address ?? old('address') }}"
                                                class=" form-control px-2 me-2 py-0 p-0 w-100" placeholder="Home Address">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                <span>Phone</span> <span>:</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="tel" name="phone"
                                                value="{{ $client->phone ?? old('phone') }}"
                                                class=" form-control px-2 me-2 py-0 p-0 w-100" placeholder="Phone Number"
                                                {{ isset($client->phone) ? 'readonly' : '' }}>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                <span>Email</span> <span>:</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="email" name="email"
                                                value="{{ $client->email ?? old('email') }}"
                                                class=" form-control px-2 me-2 py-0 p-0 w-100" placeholder="Patient Email"
                                                {{ isset($client->email) ? 'readonly' : '' }}>
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
                                            <select name="" class=" form-control px-2 me-2 py-0 p-0 w-100">
                                                <option value="">Doc Ade</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                <span>Bed No</span> <span>:</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                placeholder="Bed No">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                <span>Admission Date</span> <span>:</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                placeholder="Patient Age">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <div class="d-flex justify-content-between">
                                                <span>Discharge Date</span> <span>:</span>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="date" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                placeholder="Home Address">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-12 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-text py-1 px-2 bg-success text-white fw-bold"
                                                    id="basic-addon3">Select </span>
                                                <select id="action" class="form-control py-1 px-1">
                                                    <option value="product">Phamacuetical Items </option>
                                                    <option value="service">Hospital Services</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        @include('pos.search')
                                    </div>

                                    <div class="col-md-2">
                                        <div>
                                            <button class="btn w-100 btn-sm py-1 btn-warning text-white additem_btn"
                                                disabled>add</button>
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
                                    <th>Amount</th>
                                </tr>
                            </thead>

                            <tbody class="cart_list">

                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive shadow-lg mt-3 " style="border-radius: 5px;">
                        <table class="table table-bordered mb-0 invoice-table table-sm ">
                            <thead class="invoice-bg">
                                <tr>
                                    <th>Total Ammount</th>
                                    <th>Initial Deposit</th>
                                    <th>Outstanding Balance</th>
                                    <th>30days</th>
                                </tr>

                            </thead>

                            <tbody>

                                <tr>
                                    <td>
                                        <input type="number" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                            style="width:60px" placeholder="Total amount" name="cart_total">
                                    </td>

                                    <td>
                                        <input type="number" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                            style="width:60px" placeholder="Deposit" name="initial_deposit">
                                    </td>
                                    <td>
                                        <input type="number" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                            style="width:60px" placeholder="Outstanding" name="outstanding_balance">
                                    </td>
                                    <td>
                                        <input type="number" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                            style="width:60px" placeholder="30 days" name="tt_days">
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            $('#action').on('change', function() {
                val = $(this).val();
                if (val == 'product') {
                    $('#search_item').show();
                    $('#add_item').hide();
                    $('.additem_btn').attr('disabled', 'disabled')
                } else {
                    $('#search_item').hide();
                    $('#add_item').show();
                    $('.additem_btn').removeAttr('disabled')
                }
            })


            function trno() {
                return Math.floor(Math.random() * 10000000000000000);
            }

            const money_format = (num) => {
                var numb = new Intl.NumberFormat();
                return '₦ ' + numb.format(num);
            }

            function getItems() {
                items = (localStorage.getItem('invoice_items') == null) ? [] : JSON.parse(localStorage.getItem(
                    'invoice_items'));
                return items;
            }

            function setItem(trno, items) {
                localStorage.setItem('invoice_items', JSON.stringify(items));
            }



            function arrSort(arr) {
                arr.sort((a, b) => a - b);
                arr.reverse();
                return arr;
            }



            function displayCart() {
                items = getItems();
                card = $('.cart_list');
                card.html(``);

                cart_total = total_qty = 0;

                items = arrSort(items);

                items.map((item, index) => {
                    console.log(item);

                    total_qty += parseInt(item.qty);

                    total = parseInt(item.qty) * parseInt(item.price);
                    cart_total += parseInt(total)

                    card.append(`

                        <tr>
                            <td class="align-middle">
                                <a href="javascript:;">
                                    <h4 class="fw-bold m-0 p-0 text-info">${item.name}</h4>
                                </a>
                            </td>
                            <td class="align-middle">
                                <input type="number" class="cart_qty form-control px-2 me-2 py-0 p-0" min="1"
                                    value="${item.qty}" data-index=${item.uuid} style="width:60px">
                            </td>
                            <td class="align-middle">
                              <input type="number" class="cart_price form-control px-2 me-2 py-0 p-0" min="1" value="${item.price}" data-index=${item.uuid} style="width:80px">
                            </td>
                            <td> 
                                <div class="d-flex justify-content-between" >
                                    <span class="fw-bold mt-1" >${money_format(total)}</span>

                                    <a href="javascript:;" class="remove_item mt-1 text-danger fs-4 fw-bolder " title="Remove invoice item" data-uuid=${item.uuid} >
                                        <i class="fe fe-minus-circle"></i>
                                    </a>       
                                </div>  
                            </td>
                        </tr>
                    `)

                    $('input[name="cart_total"]').val(`${cart_total}`)
                });
            }
            displayCart();

            $(document).on('click', '.search_item', function() {
                console.log(this);
                item = $(this).data('data');
                cart = (localStorage.getItem('invoice_items') == null) ? [] : JSON.parse(localStorage
                    .getItem('invoice_items'));
                arr = {
                    uuid: Math.floor(Math.random() * 1000),
                    id: item.id,
                    type: $('#action').val(),
                    name: `${item.name}`,
                    price: item.price,
                    qty: 1,
                }
                cart.push(arr);
                $('.sbox').hide();
                $('#search').val(``);
                $('#search').removeAttr('autofocus');
                $('#search').attr('autofocus', 'autofocus');
                localStorage.setItem('invoice_items', JSON.stringify(cart));
                displayCart();
            });



            $('body').on('click', '.remove_item', function() {
                uuid = $(this).data('uuid');
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items.splice(index, 1);
                setItem('invoice_items', items);
                displayCart()
            })


            var timeout = null;


            
            $('body').on('change', '.cart_qty', function() {
                clearTimeout(timeout);
                val = parseInt($(this).val());
                if (val == "" || isNaN(val)) {
                    console.log('In valid number');
                    return;
                }
                uuid = $(this).data('index')
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items[index].qty = val
                console.log(uuid, index);
                setItem('invoice_items', items);
                displayCart()
            })

            $('body').on('change', '.cart_price', function() {
                val = $(this).val();
                uuid = $(this).data('index')
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items[index].price = val
                console.log(uuid, index);
                setItem('invoice_items', items);
                displayCart()
            })



            $(document).on('click', '.additem_btn', function() {
                cart = (localStorage.getItem('invoice_items') == null) ? [] : JSON.parse(localStorage
                    .getItem('invoice_items'));
                arr = {
                    uuid: Math.floor(Math.random() * 1000),
                    id: 7676,
                    type: $('#action').val(),
                    name: $('#service_name').val(),
                    price: 500,
                    qty: 1,
                }
                cart.push(arr);
                $('#service_name').val('')
                localStorage.setItem('invoice_items', JSON.stringify(cart));
                displayCart();
            });
        })
    </script>
@endpush
