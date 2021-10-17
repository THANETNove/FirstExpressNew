@extends('layouts.app_layouts_home')

@section('content')

<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <h1 class="text-left ">รายการใบเสร็จ</h1>
                <p class="text-left">จัดการ/รายการใบเสร็จ</p>
                <p class="text-green" id="messageEmail"> {{ Session::get('messageEmail') }}</p>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('maun_footer.maun')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">

                    </div>
                </div>
            </div><!-- /.container-fluid  ความขห่าง top-->
        </section>
        <section class="content">
            <nav>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-contact" role="tabpanel"
                                    aria-labelledby="nav-contact-tab">
                                    <section class="content">
                                        <!-- Default box -->
                                        <div class="card">
                                            <div class="card-header">
                                                <form method="POST" action="receipt-list">
                                                    @csrf
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="mb-3 row">
                                                                    <p for="inputPassword"
                                                                        class="col-sm-5 col-form-label">
                                                                        วันที่ออกใบเเจ้งหนี้</p>
                                                                    <div class="col-sm-7">
                                                                        <input type="text"
                                                                            class="form-control datepicker" name="dateOut"  placeholder="2021-10-01">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 row">
                                                                    <label for="inputPassword"
                                                                        class="col-sm-2 col-form-label">ถึง</label>
                                                                    <div class="col-sm-7">
                                                                        <input type="text"
                                                                            class="form-control datepicker_out" name="dateEnd"  placeholder="2021-10-01">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="mb-3 row">
                                                                    <div class="col-sm-7">
                                                                        <input type="text" id="search" name="search"
                                                                            placeholder="ค้นหา..." class="form-control">

                                                                    </div>
                                                                    <button class="btn btn-outline-secondary col-sm-2"
                                                                        type="submit"><i
                                                                            class="fas fa-search"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="nav nav-pills nav-sidebar flex-column nav nav-tabs">
                                                        </ul>
                                                        <p type="button" class="text-center " data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">เเสดงการค้นหาเพิ่มเติม <i
                                                                class="fas fa-angle-double-down"></i></p>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="card-body">
                                                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <div class="col-sm-12 col-md-6"></div>
                                                        <div class="col-sm-12 col-md-6"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="table-responsive">
                                                                <table id="example2"
                                                                    class="table table-bordered table-hover dataTable dtr-inline "
                                                                    role="grid" aria-describedby="example2_info">
                                                                    <thead class="red-back">
                                                                        <tr role="row">
                                                                            <th class="col-sm-1">
                                                                                <div class="text-center ">
                                                                                    <input class="list-invo allClick-cha" 
                                                                                        type="checkbox" value=""
                                                                                        id="flexCheckDefault">
                                                                                </div>
                                                                            </th>
                                                                            <th>
                                                                                รหัสลูกค้า
                                                                            </th>
                                                                            <th>
                                                                                เลขที่ใบเเจ้งหนี้
                                                                            </th>
                                                                            <th>ชื่อ-นามสกุล
                                                                            </th>
                                                                            <th>
                                                                                เลขผู้เสียภาษี
                                                                            </th>
                                                                            <th>
                                                                                จำนวนพัสดุ
                                                                            </th>
                                                                            <th>
                                                                                ส่วนลด
                                                                            </th>
                                                                            <th>
                                                                                VAT
                                                                            </th>
                                                                            <th>
                                                                                ค่าขนส่ง
                                                                            </th>
                                                                            <th>
                                                                                Emailing
                                                                            </th>
                                                                            <th>
                                                                                สถานะ
                                                                            </th>
                                                                            <th>

                                                                            </th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($billData as $user)
                                                                        <tr class="odd">
                                                                            <td>
                                                                                <div class="text-center">
                                                                                    <input
                                                                                        class="form-check-input click-cha"
                                                                                        type="checkbox"
                                                                                        value="{{$user->id}}"
                                                                                        id="flexCheck">
                                                                                </div>
                                                                            </td>
                                                                            <td>{{$user->customerCode}}</td>
                                                                            <td>{{$user->documentThat}}</td>
                                                                            <td>{{$user->name}}</td>
                                                                            <td></td>
                                                                            <td>{{$user->totalItems}}</td>
                                                                            <td>{{$user->email}}</td>
                                                                            <td>{{$user->vat}}</td>
                                                                            <td>{{$user->netTotal}}</td>
                                                                            <td>{{$user->emailing}}</td>
                                                                            <td>
                                                                                <p class="text-red">
                                                                                    {{$user->status}}
                                                                                </p>
                                                                            </td>
                                                                            <td>
                                                                            {{$user->dateInvoice}}
                                                                            </td>
                                                                        </tr>
                                                                        @endforeach

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <a  id="getMailTwo"
                                                    class="btn btn-danger box-inv">ส่งใบเเจ้งหนี้ทางอีเมล</a>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <nav>
        </section>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="receipt-list">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3 row">
                                    <label for="inputPassword"
                                        class="col-sm-6 col-form-label">วันที่ออกใบเเจ้งหนี้</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="datepicker" class="form-control datepicker"
                                            name="dateOut"  placeholder="2021-10-01">

                                    </div>
                                    <label for="inputPassword" class="col-sm-6 col-form-label">ลูกค้า</label>
                                    <div class="col-sm-6">
                                        <select class="form-control margin-model" aria-label="Default select example"
                                            name="name">
                                            @foreach ($invoiceName as $invoice)
                                            <option value="{{$invoice->name}}">
                                                {{$invoice->name}}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <label for="inputPassword" class="col-sm-6 col-form-label">เลขใบเเจ้งหนี้</label>
                                    <div class="col-sm-6">
                                        <select class="form-control margin-model" aria-label="Default select example"
                                            name="documentThat">
                                            @foreach ($invoiceDocumentThat as $invoice)
                                            <option value="{{$invoice->documentThat}}">
                                                {{$invoice->documentThat}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="inputPassword" class="col-sm-6 col-form-label">สถานะ</label>
                                    <div class="col-sm-6">
                                        <select class="form-control margin-model" aria-label="Default select example"
                                            name="status">
                                            @foreach ($invoiceStatus as $invoice)
                                            <option value="{{$invoice->status}}">
                                                {{$invoice->status}}
                                            </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <label for="inputPassword"
                                                class="col-sm-2 col-form-label margin-model">ถึง</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control datepicker_out" name="dateEnd"  placeholder="2021-10-01">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 row">
                                            <div class="col-sm-7">
                                                <input type="text" id="search" name="search" placeholder="ค้นหา..."
                                                    class="form-control">

                                            </div>
                                            <button class="btn btn-outline-secondary col-sm-2" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p type="button" class="text-center " data-bs-toggle="modal">
                            ซ่อนเเสดงการค้นหาเพิ่มเติม <i class="fas fa-angle-double-up"></i></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->




<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@include('maun_footer.footer')
@include('bill.script.list_charge')

@endsection