@extends('/admin/layouts/master',['title'=>'Transaction'])
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
                <li><span>Transaction</span></li>
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
                </header>
                <div class="card-body">
                    <table class="dataTable table table-bordered table-striped mb-0 responsive" id="datatable-default">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jatuh Tempo</th>
                                <th>Alamat</th>
                                <th>Kota</th>
                                <th>Provinsi</th>
                                <th>Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($transactions as $transaksi)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$transaksi->timeout}}</td>
                                <td>{{$transaksi->address}}</td>
                                <td>{{$transaksi->regency}}</td>
                                <td>{{$transaksi->province}}</td>
                                <td>{{$transaksi->total}}</td>
                                <td class="text-center"><span
                                        class="badge @if($transaksi->status == 'unverified') badge-secondary @elseif($transaksi->status == 'failed') badge-danger @elseif($transaksi->status == 'verified') badge-primary @elseif($transaksi->status == 'delivered') badge-info @elseif($transaksi->status == 'success') badge-success @elseif($transaksi->status == 'expired') badge-dark @elseif($transaksi->status == 'canceled') badge-warning  @endif p-1 m-1">{{$transaksi->status}}</span>
                                </td>

                                <td class="text-center">

                                    <a href="{{Route('show-transaksi',['transaction'=>$transaksi->id])}}"
                                        class=" btn btn-sm btn-dark"><i class="fas fa-eye"></i></a>

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


<div class="modal-block modal-block-primary mfp-hide" id="DeletemodalForm" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="myModalLabel">Delete Confirmation</h3>
            </div>
            <div class="modal-body">
                <p class="error-text">
                    <i class="fa fa-warning modal-icon"></i>
                    apakah anda yakin ingin menghapus item ini?
                </p>
            </div>
            <div class="modal-footer">
                <form id="formDelete" action="#" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-default modal-dismiss" data-dismiss="modal"
                        aria-hidden="true">Cancel</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $(".dataTable").on('click','.trash', function () { 
      var id = $(this).data('id');
      var nama = $(this).data('nama');
      $('#formDelete').attr('action', '/admin/product/destroy/' + id);
    });
</script>
@endsection