@php
    $role = auth()->user()->role;
@endphp

<style>
    .nav-item {
        background-color: rgb(86, 78, 78);

    }

    .nav-item:hover {
        background-color: rgb(165, 165, 150);
    }
</style>


<nav class="navbar-vertical navbar">
    <div class="nav-scroller">

        <ul class="navbar-nav flex-column" id="sideNavbar">

            <li class="nav-item bg-info text-center mb-3">
                <span class="fw-bold text-white ">Bills & Invoice</span>
            </li>



            <li class="nav-item bg-success mb-3 " style="color: white !important">
                <a class="nav-link  collapsed text-white bg-success p-3 " href="#!" data-bs-toggle="collapse"
                    data-bs-target="#maaaaa" aria-expanded="false" aria-controls="maaaaa">
                    <i class="nav-icon fe fe-lock me-2"></i> Manage Invoices
                </a>
                <div id="maaaaa" class="collapse " data-bs-parent="#sideNavbar">
                    <ul class="nav flex-column text-white">
                        <li class="nav-item d-pad ">
                            <a class="nav-link text-white d-pad " href="#">
                                <i class="nav-icon fe fe-circle me-2"></i>
                                New Invoice</a>
                        </li>
                        <li class="nav-item d-pad">
                            <a class="nav-link d-pad" href="#">
                                <i class="nav-icon fe fe-circle me-2"></i> All Invoices</a>
                        </li>

                    </ul>
                </div>
            </li>


            <li class="nav-item mb-3">
                <a class="nav-link bg-success p-3 text-white" href="/item/add">
                    <i class="nav-icon fe fe-book me-2"></i> Products & Drugs
                </a>
            </li>


            <li class="nav-item mb-3">
                <a class="nav-link bg-success p-3 text-white" href="/today_sales/{{ auth()->user()->id }}">
                    <i class="nav-icon fe fe-book me-2"></i>Today's Summary
                </a>
            </li>



            <li class="nav-item bg-success mb-3 " style="color: white !important">
                <a class="nav-link  collapsed text-white bg-success p-3 " href="#!" data-bs-toggle="collapse"
                    data-bs-target="#f34fuh4g" aria-expanded="false" aria-controls="f34fuh4g">
                    <i class="nav-icon fe fe-lock me-2"></i> Client
                </a>
                <div id="f34fuh4g" class="collapse " data-bs-parent="#f34fuh4g">
                    <ul class="nav flex-column text-white">
                        <li class="nav-item">
                            <a class="nav-link text-white " href="/admin/client/new-client">  <i class="nav-icon fe fe-circle me-2"></i> New Client</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="/admin/client/all">  <i class="nav-icon fe fe-circle me-2"></i> All Clients</a>
                        </li>

                    </ul>
                </div>
            </li>







            @if ($role == 'administrator')
                <li class="nav-item bg-info text-center mb-3">
                    <span class="fw-bold text-white ">Administrator's Functions</span>
                </li>


                <li class="nav-item bg-success mb-3">
                    <a class="nav-link text-white p-3 " href="/admin/dashboard">
                        <i class="nav-icon fe fe-home me-2"></i> Hospital's Overview
                    </a>
                </li>


                

                <li class="nav-item mb-3 bg-success ">
                    <a class="nav-link  collapsed text-white p-3 " href="#!" data-bs-toggle="collapse"
                        data-bs-target="#users_man" aria-expanded="false" aria-controls="users_man">
                        <i class="nav-icon fe fe-users me-2"></i> Manage Staffs
                    </a>
                    <div id="users_man" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="/admin/add_staff"> <i class="nav-icon fe fe-circle me-2"></i> Add Staff</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="/admin/staffs"> <i class="nav-icon fe fe-circle me-2"></i> Staff list</a>
                            </li>


                        </ul>
                    </div>
                </li>




                <li class="nav-item bg-success mb-3 " style="color: white !important">
                    <a class="nav-link  collapsed text-white bg-success p-3 " href="#!" data-bs-toggle="collapse"
                        data-bs-target="#navAuthentication" aria-expanded="false" aria-controls="navAuthentication">
                        <i class="nav-icon fe fe-lock me-2"></i> Stock Management
                    </a>
                    <div id="navAuthentication" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column text-white">
                            <li class="nav-item">
                                <a class="nav-link text-white " href="/admin/stock/3">  <i class="nav-icon fe fe-circle me-2"></i> Stock Profiler</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/admin/restock-history">  <i class="nav-icon fe fe-circle me-2"></i> Restock History</a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="nav-item mb-3 bg-success ">
                    <a class="nav-link  collapsed text-white p-3 " href="#!" data-bs-toggle="collapse"
                        data-bs-target="#expsn" aria-expanded="false" aria-controls="expsn">
                        <i class="nav-icon fe fe-users me-2"></i> Expenses Management
                    </a>
                    <div id="expsn" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/admin/expenses-overview" > <i class="nav-icon fe fe-circle me-2"></i> Overview </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="/admin/expenses-add">  <i class="nav-icon fe fe-circle me-2"></i> Add Expenses</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li class="nav-item mb-3 bg-success ">
                    <a class="nav-link  collapsed text-white p-3 " href="#!" data-bs-toggle="collapse"
                        data-bs-target="#salesreport" aria-expanded="false" aria-controls="salesreport">
                        <i class="nav-icon fe fe-book me-2"></i> Business Report
                    </a>
                    <div id="salesreport" class="collapse " data-bs-parent="#sideNavbar">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">  <i class="nav-icon fe fe-circle me-2"></i> Daily Report</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">  <i class="nav-icon fe fe-circle me-2"></i> Report On Weeks</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">  <i class="nav-icon fe fe-circle me-2"></i> Monthly Report</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="#">  <i class="nav-icon fe fe-circle me-2"></i> Report accross dates</a>
                            </li>

                        </ul>
                    </div>
                </li>
            @endif

        </ul>

    </div>
</nav>
