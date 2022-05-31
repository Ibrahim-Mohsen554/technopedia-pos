@extends('layouts.master')
@section('title')
    Technopedia - Customers
@endsection
@section('css')
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
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
                    <a class="modal-effect btn btn-dark " data-effect="effect-flip-vertical" href="#addcustomer"
                        data-toggle="modal">Add new Customer</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="dataTables_wrapper dt-bootstrap4 no-footer" id="example1">
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
                                        <td> {{ $customer->customer_phone }} </td>
                                        <td> {{ $customer->customer_address }}</td>
                                        <td> {{ $customer->customer_email }}</td>
                                        <td> {{ $customer->company_name }}</td>
                                        <td> {{ $customer->c_type }}</td>
                                        <td>{{ $customer->created_by }}</td>
                                        {{-- <td> <a href="customers.orders.create_order" class="btn btn-dark">Add Orders</a> --}}
                                        </td>
                                        <td>{{ $customer->created_at->format('m-d-Y') }}</td>


                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-pro_id="{{ $customer->id }}"
                                                data-customer_name="{{ $customer->customer_name }}"
                                                data-customer_phone="{{ $customer->customer_phone }}"
                                                data-customer_address="{{ $customer->customer_address }}"
                                                data-customer_email="{{ $customer->customer_email }}"
                                                data-c_type="{{ $customer->c_type }}"
                                                data-company_name="{{ $customer->company_name }}" data-toggle="modal"
                                                href="#editcustomer" title="edit"><i class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-pro_id="{{ $customer->id }}"
                                                data-customer_name="{{ $customer->customer_name }}" data-toggle="modal"
                                                href="#deletecustomer" title="deletecustomer"><i
                                                    class="las la-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>

        {{-- Add Customer --}}
        <div class="modal  effect-flip-vertical" id="addcustomer">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add New Customer</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>


                    <form class="form-horizontal" method="POST" action="{{ route('customers.store') }}">
                        {{-- @csrf --}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            {{-- Row 1 --}}
                            <div class="row row-sm">
                                <div class="col-lg-6 mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Customer Name:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control" placeholder="John Doe" type="text" id="customer_name"
                                            name="customer_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Phone:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control" id="customer_phone" name="customer_phone"
                                            placeholder="(000) 000-0000" type="text">
                                    </div>
                                </div>


                            </div>
                            {{-- row2 --}}
                            <div class="row row-sm mg-t-20">
                                <div class="col-lg-6 mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            Address:
                                        </div>
                                        <input class="form-control" placeholder="John Doe 123 Main St Anytown, Egy"
                                            type="text" id="customer_address" name="customer_address">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Email:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control" id="customer_email" name="customer_email"
                                            placeholder="John Doe@domain.com " type="email">
                                    </div>
                                </div>
                            </div>
                            {{-- row 3 --}}
                            <div class="row row-sm mg-t-20">

                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Customer Type:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <select class="form-control select2" name="c_type" id="c_type">

                                            <option value="End_user">
                                                End User
                                            </option>
                                            <option value="Business">
                                                Business
                                            </option>

                                        </select>
                                    </div>

                                </div>


                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Company Name:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control" placeholder="Technopedia" type="text"
                                            name="company_name" id="company_name" disabled>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-success" type="submit">Add Customer</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>








        {{-- Edit Customer --}}
        <div class="modal  effect-flip-vertical" id="editcustomer">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add New Customer</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>


                    <form class="form-horizontal" method="POST" action="customers/update">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            {{-- Row 1 --}}
                            <div class="row row-sm">
                                <div class="col-lg-6 mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Customer Name:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input type="hidden" name="pro_id" id="pro_id">
                                        <input class="form-control" placeholder="John Doe" type="text" id="customer_name"
                                            name="customer_name">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Phone:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control" id="customer_phone" name="customer_phone"
                                            placeholder="(000) 000-0000" type="text">
                                    </div>
                                </div>


                            </div>
                            {{-- row2 --}}
                            <div class="row row-sm mg-t-20">
                                <div class="col-lg-6 mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            Address:
                                        </div>
                                        <input class="form-control" placeholder="John Doe 123 Main St Anytown, Egy"
                                            type="text" id="customer_address" name="customer_address">
                                    </div>
                                </div>
                                <div class="col-lg-6 mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Email:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control" id="customer_email" name="customer_email"
                                            placeholder="John Doe@domain.com " type="email">
                                    </div>
                                </div>
                            </div>
                            {{-- row 3 --}}
                            <div class="row row-sm mg-t-20">

                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Customer Type:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <select class="form-control select2" name="c_type" id="c_type">

                                            <option value="End_user">
                                                End User
                                            </option>
                                            <option value="Business">
                                                Business
                                            </option>

                                        </select>
                                    </div>

                                </div>


                                <div class="col-lg mg-t-10 mg-lg-t-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                Company Name:
                                            </div>
                                        </div><!-- input-group-prepend -->
                                        <input class="form-control" placeholder="Technopedia" type="text"
                                            name="company_name" id="company_name" disabled>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-success" type="submit">Update Customer</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>







        {{-- Delete Model --}}

        <div class="modal" id="deletecustomer">
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
                            <input type="hidden" name="pro_id" id="pro_id">
                            <input class="form-control" name="customer_name" id="customer_name" type="text" readonly>
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
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>

    <script>
        // Edite
        $('#editcustomer').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var customer_name = button.data('customer_name')
            var customer_phone = button.data('customer_phone')
            var customer_address = button.data('customer_address')
            var customer_email = button.data('customer_email')
            var company_name = button.data('company_name')
            var c_type = button.data('c_type')
            var pro_id = button.data('pro_id')


            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #customer_name').val(customer_name);
            modal.find('.modal-body #customer_phone').val(customer_phone);
            modal.find('.modal-body #customer_address').val(customer_address);
            modal.find('.modal-body #customer_email').val(customer_email);
            modal.find('.modal-body #c_type').val(c_type);
            modal.find('.modal-body #company_name').val(company_name);
            modal.find('.modal-body #pro_id').val(pro_id);
        })

        // Delete
        $('#deletecustomer').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var pro_id = button.data('pro_id')
            var customer_name = button.data('customer_name')


            var modal = $(this)

            modal.find('.modal-body #pro_id').val(pro_id);
            modal.find('.modal-body #customer_name').val(customer_name);


        })
    </script>

    <script>
        document.getElementById("c_type").onchange = function() {
        document.getElementById("company_name").setAttribute("disabled", "disabled");

            if (this.value == 'Business') {
                document.getElementById("company_name").removeAttribute("disabled");
            }else{
                 document.getElementById("company_name").setAttribute("disabled", "disabled");
            }
            //
        };
    </script>
@endsection
