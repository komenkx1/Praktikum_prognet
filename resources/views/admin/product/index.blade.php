@extends('/admin//layouts/master',['title'=>'Product'])
@section('content')
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Admin</h2>

        <div class="right-wrapper text-right">
            <ol class="breadcrumbs">
                <li>
                    <a href="/admin">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li><span>Product</span></li>

            </ol>

            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->
    <div class="row">
        <div class="col">
            <section class="card">
                @include('admin/layouts/notif')
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <a href="{{Route('add-product')}}" class=" btn btn-sm btn-success"><i class="fa fa-plus"></i>
                        Tambah Product</a>
                </header>
                <div class="card-body">
                    <table class="dataTable table table-bordered table-striped mb-0 responsive" id="datatable-default">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Harga</th>
                                <th>category</th>
                                <th>Stock</th>
                                <th>Berat</th>
                                <th>Discount</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$product->product_name}}</td>
                                <td>{{$product->price}}</td> 
                                <td>
                                    @foreach ($product->category as $category)
                                    {{$category->category_name}}
                                    @endforeach
                                </td>  
                                <td>{{$product->stock}}</td> 
                                <td>{{$product->weight}}</td> 
                                <td>
                                    @foreach ($product->discounts as $discount)
                                    {{$discount->percentage}}%,
                                    @endforeach
                                   
                                </td> 
                                <td class="text-center">
                                    <a href="#editmodalForm" data-id="{{$product->id}}" data-nama="{{$product->category_name}}" class="edit modal-with-form btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="{{Route('show-product',['product'=>$product->id])}}"  class=" btn btn-sm btn-dark"><i class="fas fa-eye"></i></a>
                                    <a href="#DeletemodalForm" data-id="{{$product->id}}" data-nama="{{$product->category_name}}" class="trash modal-with-form btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</section>

<!-- end: page -->
</section>
<!-- Modal Form -->
<div id="modalForm" class="modal-block modal-block-primary mfp-hide">
    <section class="card">
        <header class="card-header">
            <h2 class="card-title">Category Form</h2>
        </header>
        <div class="card-body">
            <form class="form-horizontal form-bordered form-bordered container" enctype="multipart/form-data"
                action="{{Route('store-category')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label for="tags-input" class="control-label">Input Category</label>
                        {{-- <input type="text" name="categorys[]" multiple id="tags-input" data-role="tagsinput" data-tag-class="badge badge-primary" class="form-control" />
                         --}}
                        <select name="categorys[]" id="" multiple id="tags-input" required data-role="tagsinput"
                            data-tag-class="badge badge-primary" class="form-control">

                        </select>
                        <small class="text-danger">* Silahkan masukkan nama category (dapat memasukan lebih dari satu
                            nama)</small>
                    </div>
                </div>
        </div>
        <footer class="card-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-primary" type="submit">Submit</button>
                    <button class="btn btn-default modal-dismiss">Cancel</button>
                </div>
            </div>
        </footer>
        </form>

    </section>
</div>

@endsection
@section('footer')
<!-- Specific Page Vendor -->
<script src="/assets/vendor/select2/js/select2.js"></script>
<script src="/assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
<script src="/assets/js/examples/examples.datatables.default.js"></script>
<!-- Specific Page Vendor -->
<script src="/assets/vendor/select2/js/select2.js"></script>
<script src="/assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<!-- Examples -->
<script src="/assets/js/examples/examples.advanced.form.js"></script>
<script src="/assets/js/examples/examples.modals.js"></script>

<script>
    $(".dataTable").on('click','.edit', function () { 
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      $('#formEdit').attr('action', '/admin/category/update/' + id);
      $('#namainput').attr('value',nama);
    });

    $(".dataTable").on('click','.trash', function () { 
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      $('#formDelete').attr('action', '/admin/category/delete/' + id);
    });
</script>
@endsection