@extends('layouts.master')
@section('title')
    Technopedia - Categories
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
                <h4 class="content-title mb-0 my-auto">All Categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Invintory</span>
            </div>
        </div>

    </div>

    <!-- breadcrumb -->
@endsection
@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            {{-- @include('notify::messages') --}}

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
                    <a class="modal-effect btn btn-dark " data-effect="effect-flip-vertical" data-toggle="modal"
                        href="#addCategory">Add new Category</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0" style="width: 3%">#</th>
                                    <th class="wd-15p border-bottom-0">Category Name</th>
                                    <th class="wd-20p border-bottom-0">Description</th>
                                    <th class="wd-15p border-bottom-0">Created At</th>
                                    <th class="wd-15p border-bottom-0">Created By</th>
                                    <th class="wd-25p border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php
                                  $x = 0;
                              @endphp
                                @foreach ($categories as $category)
                                @php
                                    $x++
                                @endphp
                                <tr>
                                    <td>{{ $x }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>


                                        @if ($category->category_descreption != '')
                                        {{ $category->category_descreption }}
                                        @else
                                            #
                                        @endif

                                    </td>
                                    <td>{{ $category->created_at->format('m-d-Y'); }}</td>
                                    <td>{{ $category->created_by }}</td>


                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $category->id }}"
                                            data-category_name="{{$category->category_name }}" data-category_descreption="{{ $category->category_descreption }}" data-toggle="modal"
                                            href="#editCategory" title="edit"><i class="las la-pen"></i></a>

                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $category->id }}"
                                            data-category_name="{{$category->category_name }}" data-toggle="modal" href="#deleteCategory"
                                            title="deleteCategory"><i class="las la-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add Model --}}
        {{-- Add Model --}}
        <div class="modal  effect-flip-vertical" id="addCategory">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add New Category</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>


                    <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}">
                        {{-- @csrf --}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" class="form-control" id="ninjaa" name="category_name"
                                    placeholder="category Name">
                            </div>
                            <div class="form-gro">

                                <textarea name="category_descreption" id="category_descreption" class="form-control" placeholder="Description" rows="3"
                                    spellcheck="false"></textarea>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-success" type="submit">Add Category</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Edit Model --}}
        <div class="modal  effect-flip-vertical" id="editCategory">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Basic Modal</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form class="form-horizontal" method="POST" action="categories/update">
                        {{method_field('patch')}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="">
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                    placeholder="category Name">
                            </div>
                            <div class="form-gro">

                                <textarea name="category_descreption" id="category_descreption" class="form-control" placeholder="Description" rows="3"
                                    spellcheck="false"></textarea>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-success" type="submit">Update Category</button>
                            <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Delete Model --}}
        <!-- delete -->
        <div class="modal" id="deleteCategory">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Delete Category</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <form action="categories/destroy" method="post">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <p>Are you sure you want to delete</p><br>
                            <input type="hidden" name="id" id="id" value="">
                            <input class="form-control" name="category_name" id="category_name" type="text" readonly>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Aprrove</button>
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
         $('#editCategory').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var category_name = button.data('category_name')
            var category_descreption = button.data('category_descreption')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #category_name').val(category_name);
            modal.find('.modal-body #category_descreption').val(category_descreption);
        })

        // Delete
        $('#deleteCategory').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var category_name = button.data('category_name')
            var modal = $(this)
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #category_name').val(category_name);

        })

    </script>
@endsection
