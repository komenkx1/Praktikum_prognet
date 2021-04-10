@extends('/admin/layouts/master',['title'=>'Transaction Detail'])
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
                <li>
                    <a href="{{Route('transaksi-admin')}}">
                        <span>Transaction</span>
                    </a>
                </li>
                <li><span>Transaction Detail</span></li>
            </ol>
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>
    <!-- start: page -->
    <div class="">
        <div class="col">
            <section class="card">
                @include('admin/layouts/notif')

                <div class="card-body row">
                    <div class="col-md-6">
                        <form class="form-horizontal form-bordered form-bordered container"
                            enctype="multipart/form-data" action="{{Route('store-product')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="tags-input" class="control-label">Nama Pembeli<small
                                            class="text-danger font-weight-bold">*</small></label>
                                    <input type="text" required name="name" value="{{$detail->Transaction->user->name}}"
                                        disabled class="form-control" placeholder="Masukkan Product Name">
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label for="tags-input" class="control-label">Email <small
                                            class="text-danger font-weight-bold">*</small></label>
                                    <input type="email" required name="email" class="form-control"
                                        placeholder="Masukkan Email" value="{{$detail->Transaction->user->email}}"
                                        disabled>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label for="tags-input" class="control-label">alamat <small
                                            class="text-danger font-weight-bold">*</small></label>
                                    <input type="text" required name="alamat" value="{{$detail->Transaction->address}}"
                                        class="form-control" placeholder="Masukkan Alamat" disabled>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label for="tags-input" class="control-label">Nomor Telepon <small
                                            class="text-danger font-weight-bold">*</small></label>
                                    <input type="number" required name="weight" class="form-control"
                                        placeholder="Masukkan Nomor Telepon" disabled
                                        value="{{$detail->Transaction->telp}}">

                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label for="tags-input" class="control-label">Kota<small
                                            class="text-danger font-weight-bold">*</small></label>
                                    <input type="text" required name="porivinsi"
                                        value="{{$detail->Transaction->regency}}" disabled multiple
                                        class="form-control p-1">


                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label for="tags-input" class="control-label">Provinsi<small
                                            class="text-danger font-weight-bold">*</small></label>
                                    <input type="text" required name="porivinsi"
                                        value="{{$detail->Transaction->province}}" disabled multiple
                                        class="form-control p-1">


                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <h4 class="m-0 font-weight-bolder">Pricing</h4>
                        <hr class="m-0 p-0">
                        <p class="p-0 m-0"><b> Harga Product : </b>
                            <span>{{number_format($detail->Product->price, 0, ',', '.')}}</span></p>
                        <p class="p-0 m-0"><b> Diskon : </b> <span>{{$detail->discount}} %</span></p>

                        <p class="p-0 m-0"><b> Sub Total : </b>
                            <span>{{number_format($detail->Transaction->sub_total, 0, ',', '.')}}</span></p>
                        <p class="p-0 m-0"><b> Ongkos Kirim : </b>
                            <span>{{number_format($detail->Transaction->shipping_cost, 0, ',', '.')}}</span></p>

                        <p class="p-0 m-0"><b> Total : </b> <span>Rp.
                                {{number_format($detail->Transaction->total, 0, ',', '.')}}</span></p>
                        <p class="p-0 m-0"><b> Status : </b> <span
                                class="badge @if($transaction->status == 'unverified') badge-secondary @elseif($transaction->status == 'failed') badge-danger @elseif($transaction->status == 'verified') badge-primary @elseif($transaction->status == 'delivered') badge-info @elseif($transaction->status == 'success') badge-success @elseif($transaction->status == 'expired') badge-dark @elseif($transaction->status == 'canceled') badge-warning  @endif p-1 m-1">{{$transaction->status}}</span>
                        </p>
                        <div class="button d-flex justify-content-start">
                            <button data-toggle="modal" data-target="#modalBukti" class="btn btn-warning mr-2">Bukti
                                Pembayaran</button>

                            @if ($transaction->status == 'unverified' || $transaction->status == 'failed')
                            <button data-toggle="modal" data-target="#modalVerif" data-input="Verif"
                                class="verfif btn btn-success mr-2">Verif @if($transaction->status == 'failed') Lagi
                                @endif</button>

                            <button data-toggle="modal" data-target="#modalVerif" data-input="Reject"
                                class="reject btn btn-danger mr-2">Reject</button>
                            @elseif($transaction->status == 'verified')
                            <button data-toggle="modal" data-target="#modalVerif" data-input="Delivery"
                                class="delivery btn btn-info mr-2">Delivery</button>
                            @endif
                        </div>
                        <br>
                        <table class="table table-bordered table-striped mb-0 responsive">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Qty</th>
                                    <th class="text-center">Berat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($detail->Transaction->product as $product)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$product->product_name}}</td>


                                    <td class="text-center">

                                        {{$detail->qty}} pcs

                                    </td>
                                    <td class="text-center">

                                        {{$product->weight}} Gram

                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<!-- end: page -->
</section>

</form>

</section>
</div>


<div id="modalBukti" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-name">Bukti Pembayaran</h4>
            </div>
            <div class="modal-body">

                <img class="w-100" src="{{$detail->Transaction->image}}" alt="">
            </div>
        </div><!-- /.modal-content -->
    </div>
</div><!-- /.modal-dialog -->


<div id="modalVerif" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="title-name">Alert!</h4>
            </div>
            <div class="modal-body">
                <h4>Apakah Anda yakin ingin Mengupdate status transaksi ini?</h4>
                <form action="{{Route('update-transaksi',['transaction'=>$transaction->id])}}" method="POST"
                    class="form-group" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input id="submit" type="submit" name="submit" value="" class="float-right btn btn-dark mt-3">
            </div>
            </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
@endsection
@section('footer')
<script>
    $(document).on('click','.verfif', function () { 
      var id = $(this).data('id');
      var input = $(this).data('input');
      $('#submit').attr('value', input);
    });
    $(document).on('click','.delivery', function () { 
      var id = $(this).data('id');
      var input = $(this).data('input');
      $('#submit').attr('value', input);
    });
    $(document).on('click','.reject', function () { 
      var id = $(this).data('id');
      var input = $(this).data('input');
      $('#submit').attr('value', input);
    });
</script>
@endsection