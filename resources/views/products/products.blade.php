@extends('layouts.master')
@section('title')
    Technopedia - Products
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
                <h4 class="content-title mb-0 my-auto">All Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Products</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row-sm">
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
                    <a class="modal-effect btn btn-dark " data-effect="effect-flip-vertical" data-toggle="modal"
                        href="#addproduct">Add new Product</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th class=" border-bottom-0" style="width: 3%">#</th>
                                    <th class=" border-bottom-0">SKU Num</th>
                                    <th class=" border-bottom-0">Product Name</th>
                                    <th class=" border-bottom-0">Barcode </th>
                                    <th class=" border-bottom-0">Brand Name</th>
                                    <th class=" border-bottom-0">Category Name</th>
                                    <th class=" border-bottom-0">Qty in Stock</th>
                                    <th class=" border-bottom-0">Buy Price</th>
                                    <th class=" border-bottom-0">Sell Price</th>
                                    <th class=" border-bottom-0">Created At</th>
                                    <th class=" border-bottom-0">Created By</th>
                                    <th class=" border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $x = 0;
                                @endphp
                                @foreach ($products as $product)
                                    @php
                                        $x++;
                                    @endphp
                                    <tr>
                                        <td>{{ $x }}</td>
                                        <td>{{ $product->sku_num }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ $product->barcode }}</td>
                                        <td>{{ $product->brand->brand_name }}</td>
                                        <td>{{ $product->category->category_name }}</td>
                                        <td>{{ $product->Qty_instock }}</td>
                                        <td>{{ $product->buy_price }}</td>
                                        <td>{{ $product->sell_price }}</td>
                                        <td>{{ $product->created_by }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                                data-id="{{ $product->id }}" data-sku_num="{{ $product->sku_num }}"
                                                data-product_name="{{ $product->product_name }}"
                                                data-barcode="{{ $product->barcode }}"
                                                data-brand_name="{{ $product->brand->brand_name }}"
                                                data-brand_id="{{ $product->brand->brand_id }}"
                                                data-category_id="{{ $product->category->id }}"
                                                data-category_name="{{ $product->category->category_name }}"
                                                data-instock="{{ $product->Qty_instock }}"
                                                data-buy_price="{{ $product->buy_price }}"
                                                data-sell_price="{{ $product->sell_price }}" data-toggle="modal"
                                                href="#editproduct" title="edit"><i class="las la-pen"></i></a>

                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-pro_id="{{ $product->id }}"
                                                data-product_name="{{ $product->product_name }}" data-toggle="modal"
                                                href="#deleteproduct" title="delete Product"><i
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


        {{-- Add Model --}}
        <div class="modal  effect-flip-vertical" id="addproduct">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add New Product</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>


                    <form class="form-horizontal" method="POST" action="{{ route('products.store') }}">
                        {{-- @csrf --}}
                        {{ csrf_field() }}
                        <div class="modal-body">
                            {{-- row1 --}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sku_num">Sku number</label>
                                        <input type="text" class="form-control" id="sku_num" name="sku_num"
                                            placeholder="sku number">
                                    </div>

                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="product_name">Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name"
                                            placeholder="Product Name">
                                    </div>
                                </div>
                            </div>

                            {{-- row 2 --}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="brand_name">Brand Name</label>
                                        <select class="form-control select2-no-search" name="brand_name" id="brand_name">



                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="category_name">Category Name</label>
                                        <select class="form-control select2-no-search" name="category_name"
                                            id="category_name">

                                            <option label="Choose one" disabled selected>
                                            </option>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                            {{-- row 3 --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="qty in stock">qty in stock</label>

                                        <input type="number" class="form-control" id="qty_stock" name="qty_stock"
                                            placeholder="qty in stock" min="0">
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="buy_price">buy price</label>
                                        <input type="number" class="form-control" id="buy_price" name="buy_price"
                                            placeholder="buy price" min="0">
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="buy_price">Sell price</label>
                                        <input type="number" class="form-control" id="sell_price" name="sell_price"
                                            placeholder="Sell price" min="0">
                                    </div>

                                </div>
                            </div>
                            {{-- row 4 --}}
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">

                                        <label for="barcode">Barcode</label>
                                        <input type="text" class="form-control" name="barcode" id="barcode">

                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-success" type="submit">Add Product</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Edit Model --}}
    <div class="modal  effect-flip-vertical" id="editproduct">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Edit Product</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form class="form-horizontal" method="POST" action="products/update">

                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{-- row1 --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="sku_num">Sku number</label>
                                    <input type="hidden" class="form-control" id="id" name="id">
                                    <input type="text" class="form-control" id="sku_num" name="sku_num"
                                        placeholder="sku number">
                                </div>

                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="product_name">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder="Product Name">
                                </div>
                            </div>
                        </div>

                        {{-- row 2 --}}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="brand_name">Brand Name</label>
                                    <select class="form-control select2-no-search" name="brand_name" id="brand_name"
                                        disabled>




                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <select class="form-control select2-no-search" name="category_name"
                                        id="category_name" disabled>

                                        <option label="Choose one" disabled selected>
                                        </option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->category_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- row 3 --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="qty in stock">qty in stock</label>

                                    <input type="number" class="form-control" id="Qty_instock" name="Qty_instock"
                                        placeholder="qty in stock" min="0">
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="buy_price">buy price</label>
                                    <input type="number" class="form-control" id="buy_price" name="buy_price"
                                        placeholder="buy price" min="0">
                                </div>

                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="buy_price">Sell price</label>
                                    <input type="number" class="form-control" id="sell_price" name="sell_price"
                                        placeholder="Sell price" min="0">
                                </div>

                            </div>
                        </div>
                        {{-- row 4 --}}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="barcode">Barcode</label>
                                    <input type="text" class="form-control" name="barcode" id="barcode" >
                                </div>
                            </div>
                        </div>




                    </div>
                    <div class="modal-footer">
                        <button class="btn ripple btn-success" type="submit">Add Product</button>
                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <!-- delete -->
    <div class="modal" id="deleteproduct">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Delete Product</h6><button aria-label="Close" class="close"
                        data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="products/destroy" method="post">
                    {{ method_field('delete') }}
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <p>Are you sure you want to delete Product </p><br>
                        <input type="hidden" name="pro_id" id="pro_id">
                        <input class="form-control" name="product_name" id="product_name" type="text" readonly>
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
    $(document).ready(function() {
        $('select[name="category_name"]').on('change', function() {
            var SectionId = $(this).val();
            if (SectionId) {
                $.ajax({
                    url: "{{ URL::to('/dashboard/category') }}/" + SectionId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="brand_name"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="brand_name"] ').append(
                                '<option selected value="' + key + '">' +
                                value + '</option>');
                        });

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }


        });
    });
</script>


<script>
    // Edite
    $('#editproduct').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var sku_num = button.data('sku_num')
        var product_name = button.data('product_name')
        var barcode = button.data('barcode')
        var brand_name = button.data('brand_name')
        var brand_id = button.data('brand_id')
        var category_name = button.data('category_name')
        var category_id = button.data('category_id')
        var Qty_instock = button.data('instock')
        var buy_price = button.data('buy_price')
        var sell_price = button.data('sell_price')

        var modal = $(this)
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #sku_num').val(sku_num);
        modal.find('.modal-body #product_name').val(product_name);
        modal.find('.modal-body #barcode').val(barcode);
        modal.find('.modal-body #brand_name').val(brand_name);
        modal.find('.modal-body #brand_name').val(brand_id);
        modal.find('.modal-body #category_name').val(category_id);
        modal.find('.modal-body #Qty_instock').val(Qty_instock);
        modal.find('.modal-body #buy_price').val(buy_price);
        modal.find('.modal-body #sell_price').val(sell_price);













    })
</script>
<script>
    // Delete
    $('#deleteproduct').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var pro_id = button.data('pro_id')
        var product_name = button.data('product_name')


        var modal = $(this)
        modal.find('.modal-body #pro_id').val(pro_id);
        modal.find('.modal-body #product_name').val(product_name);



    })
</script>
@endsection
