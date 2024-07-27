@extends('layout.app')
@section('page_title')
    Edit Invoice
@endsection

@php

    $client = $summary->client;
@endphp

@section('page_content')
    <div class="row">

        <div class="col-lg-12 col-md-12 col-12">
            <div class=" pb-4 mb-2 d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h1 class="mb-1 h2 fw-bold">
                        View invoice
                    </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">View Invoice</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $summary->invoice_number }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>



        <div class="col-md-12  ">
            @php
                $client = $summary->client;
            @endphp



            <div class="m-3">
                <div class="row">


                    <div class="col-md-12">





                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2 d-flex justify-content-end ">
                                    <button class="btn btn-info me-2"> <i class="fe fe-credit"></i> Make Payment</button>
                                    <a href="/invoice/print/{{ $summary->id }}" class="btn btn-dark-info me-2"> <i
                                            class="fe fe-printer"></i> Print
                                        Invoice</button>
                                        <a class="btn btn-danger"
                                            onclick="return confrim('Invovice and payment will be deleted')"> <i
                                                class="fe fe-trash"></i> Delete Invoice</a>
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
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="text" name="firstname"
                                                                    value="{{ $client->firstname ?? old('firstname') }}"
                                                                    class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                                    placeholder="First Name">

                                                                <input type="hidden" name="client_id"
                                                                    value="{{ $client->id ?? '' }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="lastname"
                                                                    value="{{ $client->lastname ?? old('lastname') }}"
                                                                    class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                                    placeholder="Last name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="row mb-2">
                                                    <div class="col-md-4">
                                                        <div class="d-flex justify-content-between">
                                                            <span>UPN</span> <span>:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" name="upn"
                                                            value="{{ $client->upn ?? old('upn') }}"
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                            placeholder="Enter UPN">
                                                    </div>
                                                </div>

                                                <div class="row mb-2">
                                                    <div class="col-md-4">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Age</span> <span>:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="number" name="age"
                                                            value="{{ $client->age ?? old('age') }}"
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                            placeholder="Patient Age">
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
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                            placeholder="Home Address">
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
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                            placeholder="Phone Number"
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
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                            placeholder="Patient Email"
                                                            {{ isset($client->email) ? 'readonly' : '' }}>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="fw-bold" style="text-decoration: underline">Hospital Details
                                                </h4>
                                                <div class="row mb-4">
                                                    <div class="col-md-4">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Doctor</span> <span>:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <select name="doctor"
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100">
                                                            @foreach ($doctors as $doc)
                                                                <option value="{{ $doc->id }}"  {{ ($doc->id == $summary->doctor_id) ? 'selected' : '' }} >{{ $doc->name }}</option>
                                                            @endforeach
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
                                                        <input type="text" name="bed_no"
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                            value="{{ $summary->bed }}" placeholder="Bed No">
                                                    </div>
                                                </div>

                                                <div class="row mb-4">
                                                    <div class="col-md-4">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Admission Date</span> <span>:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="date" name="admission_date"
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                            value="{{ $summary->admission_date }}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-4">
                                                        <div class="d-flex justify-content-between">
                                                            <span>Discharge Date</span> <span>:</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="date" name="discharge_date"
                                                            class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                            value="{{ $summary->discharge_date }}">
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
                                                            <span
                                                                class="input-group-text py-1 px-2 bg-success text-white fw-bold"
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
                                                        <button
                                                            class="btn w-100 btn-sm py-1 btn-warning text-white additem_btn"
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
                                                <th>
                                                    <div class="d-flex justify-content-end">
                                                        Amount
                                                    </div>
                                                </th>
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
                                                <th>Total Amount</th>
                                                <th>Initial Deposit</th>
                                                <th>Outstanding Balance</th>
                                                <th>30days</th>
                                            </tr>
                                        </thead>


                                        <tbody>

                                            <tr>
                                                <td>
                                                    <input type="number" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                        style="width:60px" placeholder="Total amount" readonly
                                                        name="cart_total">
                                                </td>

                                                <td>
                                                    <input type="number" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                        style="width:60px" placeholder="Deposit" name="initial_deposit"
                                                        readonly>
                                                </td>
                                                <td>
                                                    <input type="number" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                        style="width:60px" placeholder="Outstanding" readonly
                                                        name="outstanding_balance">
                                                </td>
                                                <td>
                                                    <input type="number" class=" form-control px-2 me-2 py-0 p-0 w-100"
                                                        style="width:60px" placeholder="30 days" name="tt_days">
                                                </td>
                                            </tr>
                                        </tbody>


                                    </table>

                                </div>
                                <div class="mt-3 d-flex justify-content-end ">
                                    <button class="btn btn-warning">Update Client Invoice</button>
                                </div>


                            </div>




                        </div>
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



            const money_format = (num) => {
                var numb = new Intl.NumberFormat();
                return '₦ ' + numb.format(num);
            }

            function getItems() {
                items = (localStorage.getItem('edit_invoice') == null) ? [] : JSON.parse(localStorage.getItem(
                    'edit_invoice'));
                return items;
            }

            function setItem(trno, items) {
                localStorage.setItem('edit_invoice', JSON.stringify(items));
            }






            function arrSort(arr) {
                arr.sort((a, b) => a - b);
                arr.reverse();
                return arr;
            }


            function calTotal() {
                total = $('input[name="cart_total"]').val();
                initial_deposit = $('input[name="initial_deposit"]').val();
                $('input[name="outstanding_balance"]').val(`${ total-initial_deposit }`);
            }

            $('input[name="initial_deposit"]').on('keyup', function() {
                calTotal();
            })

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
                    calTotal();
                });
            }
            displayCart();

            $(document).on('click', '.search_item', function() {
                console.log(this);
                item = $(this).data('data');
                cart = (localStorage.getItem('edit_invoice') == null) ? [] : JSON.parse(localStorage
                    .getItem('edit_invoice'));
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
                localStorage.setItem('edit_invoice', JSON.stringify(cart));
                displayCart();

                msg(`${ item.name } has been added to invoice`)

            });



            $('body').on('click', '.remove_item', function() {
                uuid = $(this).data('uuid');
                items = getItems();
                const index = items.findIndex(object => {
                    return object.uuid == uuid;
                });
                items.splice(index, 1);
                setItem('edit_invoice', items);
                displayCart()

                msg('Item has been removed from invoice list')

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
                setItem('edit_invoice', items);
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
                setItem('edit_invoice', items);
                displayCart()
            })


            function checMeJusOut(btn, print) {
                action = 'add_new';
                firstname = $('input[name="firstname"]').val();
                lastname = $('input[name="lastname"]').val();
                upn = $('input[name="upn"]').val();
                age = $('input[name="age"]').val();
                email = $('input[name="email"]').val();
                address = $('input[name="address"]').val();
                phone = $('input[name="phone"]').val();
                bed = $('input[name="bed_no"]').val();
                admission_date = $('input[name="admission_date"]').val();
                discharge_date = $('input[name="discharge_date"]').val();

                total = $('input[name="cart_total"]').val();
                initial_deposit = $('input[name="initial_deposit"]').val();
                invoice_number = $('input[name="invoice_number"]').val();
                outstanding_balance = $('input[name="outstanding_balance"]').val();
                doctor = $('select[name="doctor"]').val();
                days = $('input[name="tt_days"]').val();
                client_id = $('input[name="client_id"]').val();
                mode = $('#payment_mode').val();

                if (!firstname) {
                    msg('Please enter all required field');
                    return;
                }

                end_point = 'edit_invoice'

                btn_html = btn.html();

                summary_id = `0`;
                console.log(summary_id);

                $.ajax({
                    method: 'post',
                    url: end_point,
                    data: {
                        '_token': `{{ csrf_token() }}`,
                        total,
                        doctor,
                        initial_deposit,
                        invoice_number,
                        outstanding_balance,
                        days,
                        client_id,
                        items: getItems(),
                        sales_id: '0',
                        mode: mode,
                        action: action,
                        delete_id: summary_id,
                        firstname,
                        lastname,
                        bed,
                        address,
                        phone,
                        email,
                        age,
                        upn,
                        admission_date,
                        discharge_date,
                    },
                    beforeSend: () => {
                        btn.html(`
                         <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> invoice is being created...  
                    `)
                    }
                }).done(function(res) {
                    console.log(res);
                    localStorage.removeItem('edit_invoice')
                    msg(res.message);
                    btn.html(`${btn_html}`);
                    if (print == 'print') {
                        location.href = `/invoice/print/${res.sales_id}`
                    }

                }).fail(function(res) {
                    console.log(res);
                    btn.html(`${btn_html}`)

                })
            }




            $(document).on('click', '.additem_btn', function(e) {
                e.preventDefault();
                cart = (localStorage.getItem('edit_invoice') == null) ? [] : JSON.parse(localStorage
                    .getItem('edit_invoice'));
                item_name = $('#service_name').val();

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
                localStorage.setItem('edit_invoice', JSON.stringify(cart));
                displayCart();


                msg(`${ item_name } has been added to invoice`)


            });


            $('.checkout').on('click', function(e) {
                e.preventDefault();
                btn = $(this);
                checMeJusOut(btn, 'print');
            })




            function getSaleAndPutToSession(sales_id) {

    

                console.log(sales_id);

                $.ajax({
                    method: 'get',
                    url: `/get_sales/${sales_id}`
                }).done(function(res) {
                    console.log(res);


                    cart = [];

                    res.sales.forEach(sale => {
                        arr = {
                            uuid: Math.floor(Math.random() * 1000),
                            id: sale.id,
                            invoice_id: sale.id,
                            name: sale.item.name,
                            price: sale.rate,
                            qty: sale.qty,
                            quantity: sale.item.stock_qty
                        }
                        cart.push(arr);
                    });
                    localStorage.setItem('edit_invoice', JSON.stringify(cart));

                    displayCart();

                    $('input[name="initial_deposit"]').val(`${res.sumary.initial_deposit}`)
                    $('input[name="tt_days"]').val(`${res.sumary.days}`)

                }).fail(function(res) {
                    console.log(res);
                })
            }

            let sales_id = `{{ $sales_id }}`
            getSaleAndPutToSession(sales_id);



        })
    </script>
@endpush
