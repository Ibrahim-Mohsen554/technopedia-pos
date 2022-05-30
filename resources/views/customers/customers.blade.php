@extends('layouts.master')
@section('title')
    Technopedia - Customers
@endsection
@section('css')
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">All Customers</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Customers</span>
            </div>
        </div>

    </div>

    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">

                <div class="card-header pb-0">
                    <a class="modal-effect btn btn-dark " data-effect="effect-flip-vertical"
                        href="{{ route('customers.create') }}">Add new Customer</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class=" border-bottom-0" style="width: 3%">#</th>
                                    <th class=" border-bottom-0">Customer Name</th>
                                    <th class=" border-bottom-0">Phone Number</th>
                                    <th class=" border-bottom-0">Address</th>
                                    <th class=" border-bottom-0">Email</th>
                                    <th class=" border-bottom-0">company</th>
                                    <th class=" border-bottom-0">Customer Type</th>
                                    <th class=" border-bottom-0">Created By</th>
                                    <th class=" border-bottom-0">Create Order</th>
                                    <th class=" border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $x = 0;
                                @endphp
                                @foreach ($customers as $customer)
                                    @php
                                        $x++;
                                    @endphp
                                    <tr>
                                        <td>{{ $x }}</td>
                                        <td>{{ $customer->customer_name }}</td>
                                        <td> {{ $customer->phone }} </td>
                                        <td> {{ $customer->address}}</td>
                                        <td> {{ $customer->email}}</td>
                                        <td> {{ $customer->company_name}}</td>
                                        <td> {{ $customer->c_type}}</td>
                                        {{-- <td>{{ $customers->created_by }}</td> --}}
                                        <td> <a href="customers/orders/create_order" class="btn btn-dark">Add Orders</a></td>
                                        {{-- <td>{{ $customers->created_at->format('m-d-Y') }}</td> --}}


                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-pro_id="{{ $customer->id }}"
                                                data-customer_name=""
                                                data-customer_desc=""
                                                data-category_name=""
                                                data-toggle="modal" href="#editcustomer" title="edit"><i
                                                    class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-id="{{ $customer->id }}"
                                                data-customer_name="{{ $customer->customer_name }}" data-toggle="modal"
                                                href="#deletecustomer" title="deletecustomer"><i class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        {{-- Delete Model --}}

        <div class="modal" id="deletecustomers">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete brand</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="customers/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>Are you sure you want to delete</p><br>
                            <input type="hidden" name="id" id="id" >
                            <input class="form-control" name="brand_name" id="brand_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Aprrove</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

    <script>
        // Edite
        $('#editbrand').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var brand_name = button.data('brand_name')
            var brand_desc = button.data('brand_desc')
            var category_name = button.data('category_name')
            var pro_id = button.data('pro_id')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #brand_name').val(brand_name);
            modal.find('.modal-body #brand_desc').val(brand_desc);
            modal.find('.modal-body #category_name').val(category_name);
            modal.find('.modal-body #pro_id').val(pro_id);
        })

        // Delete
        $('#deletebrand').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var brand_name = button.data('brand_name')
            var brand_desc = button.data('brand_desc')

            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #brand_name').val(brand_name);
            modal.find('.modal-body #brand_desc').val(brand_desc);


        })
    </script>
@endsection
