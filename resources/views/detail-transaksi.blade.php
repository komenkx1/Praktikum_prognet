{{-- <html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
    @if ($transaksi->status == 'canceled')
    <h2>Transaksi Dibatalkan</h2>
    @elseif ($transaksi->status == 'verified')
    <h2>Transaksi Terverifikasi, Barang Akan Segera Dikirim</h2>
    @elseif ($transaksi->status == 'delivered')
    <h2> Barang Sudah Dikirim</h2>
    @elseif ($transaksi->status == 'success')
    <h2> Barang Sudah Diterima, Transaksi Success</h2>
    @elseif ($transaksi->status == 'expired')
    <h2> TRANSAKSI EXPIRED</h2>
    @else
    @if (!$transaksi->proof_of_payment && $transaksi->status == 'unverified')
    <div id="countdown"> </div>
    @else
    <h2>Bukti Pembayaran Diterima, silahkan tunggu admin memverifikasi bukti pembayaran</h2>
    @endif
    @endif



    <table>
        <thead>
            <th>Nama Product</th>
            <th>Qty</th>
            <th>Price</th>
            @if ($transaksi->status == 'success')
            <th>Action</th>
            @endif


        </thead>
        <tbody>
            @foreach ($transaksidetails as $item)


            <tr>

                <td>
                    {{$item->Product->product_name}}
                </td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->price}}</td>
                @if ($transaksi->status == 'success')


                <td>


                    <button type="button" data-id="{{$item->product->id}}" class="btn btn-primary review"
                        data-toggle="modal" data-target="#ModalLoginForm">
                        review
                    </button>

                </td>

                @endif
            </tr>

            @endforeach
        </tbody>
    </table>
    <hr>
    <div class="SubTotal">
        <p>Sub-Total : {{$transaksi->sub_total}}</p>
    </div>
    <hr>
    <div class="ongkir">
        <p>Ongkos Kirim : {{$transaksi->shipping_cost}}</p>
    </div>
    <hr>
    <div class="total">
        <p>Total : {{$transaksi->total}}</p>
    </div>
    @if ($transaksi->proof_of_payment && $transaksi->status == 'delivered')

    <form action="{{Route('verif-barang-diterima',['transactions' => $transaksi->id])}}" method="POST"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <button type="submit">Konfirmasi Barang Diterima</button>
    </form>
    @endif

    @if (!$transaksi->proof_of_payment && $transaksi->status == 'unverified')

    <form action="{{Route('cancel',['transactions' => $transaksi->id])}}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <button type="submit">Cancel</button>
    </form>

    <form action="{{Route('upload-bukti',['transactions' => $transaksi->id])}}" method="POST"
        enctype="multipart/form-data">
        @method('put')
        @csrf
        <label for="upload bukti"></label>
        <input type="file" name="proof_of_payment">
        <button type="submit">Submit</button>
    </form>

    @endif

    <!-- Modal HTML Markup -->
    <div id="ModalLoginForm" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title">Berikan Ulasan</h1>
                </div>
                <div class="modal-body">


                    <div class="form-group">
                        <input type="number" id="rate" name="rate" value="">
                        <small>*isikan 1-5</small>
                    </div>

                    <div class="form-group">
                        <label for="ulasan">Ulasan</label>
                        <textarea name="content" id="content" cols="30" rows="10"></textarea>

                    </div>
                    <button type="button" id="btn-submit" data-id="">Submit</button>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <script src="/https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="/https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $(document).on('click','.review', function () {
      var id = $(this).data('id');
      $('#btn-submit').attr('data-id', id);
    });

    function resetMyForm(){
		$('input').val('');
		$('textarea').val(''); 
}
    $('#btn-submit').click(function(){
		var id = $(this).data('id');
		var rate = $('#rate').val();
		var content = $('#content').val();
		$.ajax({
			url: '{{Route("store-review")}}',
			type: 'post',
			data: {id: id, rate : rate,content : content},
			success: function(data){
				 $('#ModalLoginForm').modal('hide');
                    resetMyForm();

        console.log('berhasil memasukan ulasan');
            
			}
		});
	});
    CountDownTimer('{{$transaksi->created_at}}', 'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new Date('{{$transaksi->timeout}}');
        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;
        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML = days + 'days ';
            document.getElementById(id).innerHTML += hours + 'hrs ';
            document.getElementById(id).innerHTML += minutes + 'mins ';
            document.getElementById(id).innerHTML += seconds + 'secs';
            document.getElementById(id).innerHTML +='<h2>BATAS WAKTU PEMBAYARAN';
        }
        timer = setInterval(showRemaining, 1000);
    }
    </script>
</body>

</html> --}}

@extends('layouts/master')
@section('content')

<div class="banner-wrapper has_background">
    <img src="/assets/images/banner-for-all2.jpg" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title container">Transaction</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs container">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Transaction</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<main class="site-main main-container no-sidebar">
    <div class="container">
        <div class="time text-center">
            @if ($transaksi->status == 'canceled')
            <h2>Transaksi Dibatalkan</h2>
            @elseif ($transaksi->status == 'verified')
            <h2>Transaksi Terverifikasi, Barang Akan Segera Dikirim</h2>
            @elseif ($transaksi->proof_of_payment && $transaksi->status == 'delivered')
            <h2> Barang Sudah Dikirim</h2>
            <form action="{{Route('verif-barang-diterima',['transactions' => $transaksi->id])}}" method="POST"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <button type="submit">Konfirmasi Barang Diterima</button>
            </form>
            @elseif ($transaksi->status == 'success')
            <h2> Barang Sudah Diterima, Transaksi Success</h2>
            @elseif ($transaksi->status == 'expired')
            <h2> TRANSAKSI EXPIRED</h2>
            @else
            @if (!$transaksi->proof_of_payment && $transaksi->status == 'unverified')
            <div id="countdown"> </div>
            <form action="{{Route('cancel',['transactions' => $transaksi->id])}}" method="POST"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <button type="submit">Cancel Transaction</button>
            </form>
            @else
            <h2>Bukti Pembayaran Diterima, silahkan tunggu admin memverifikasi bukti pembayaran</h2>
            @endif
            @endif

        </div>
        <hr>
        <div class="row">
            @if ($transaksi->status == 'unverified' && $transaksi->proof_of_payment == null)

            <div class="main-content col-md-6">

                <div class="col2-set w-100" id="customer_details">
                    <div class="col-1">
                        <div class="kobolg-billing-fields">
                            <h3>Upload Bukti Bayar</h3>
                            <div class="kobolg-billing-fields__field-wrapper">
                                <form action="{{Route('upload-bukti',['transactions' => $transaksi->id])}}"
                                    method="POST" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <p class="form-row form-row-wide bukti-field validate-required form-group"
                                        id="billing_bukti_1_field" data-priority="50"><label for="billing_bukti_1"
                                            class="">Bukti Pembayaran&nbsp;<abbr class="required"
                                                title="required">*</abbr></label><span
                                            class="kobolg-input-wrapper"><input type="file" id="file-upload"
                                                class="input-name form-control" name="proof_of_payment"
                                                id="billing_bukti_1" placeholder="bukti Lengkap" value=""
                                                autocomplete="bukti-line1" data-placeholder="bukti Lengkap"></span>
                                    </p>
                                    <button type="submit" class="button alt" id="submit" value="submit"
                                        data-value="Submit">Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            @endif
            <div
                class="main-content @if($transaksi->status == 'unverified' && $transaksi->proof_of_payment == null) col-md-6 @else col-md-12 @endif">
                <div class="page-main-content">
                    <div class="kobolg">
                        <div class="kobolg-notices-wrapper"></div>
                        <form class="kobolg-cart-form">
                            <table class="shop_table shop_table_responsive cart kobolg-cart-form__contents"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="product-name">nama</th>
                                        <th class="product-adress">Price</th>
                                        <th class="product-qty">qty</th>
                                        @if ($transaksi->status == 'success')
                                        <th class="product-action">action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($transaksidetails as $item)

                                    <tr class="kobolg-cart-form__cart-item cart_item">
                                        <td class="name">
                                            <a href="#">{{$item->product->product_name}}</a></td>
                                        <td class="prices">
                                            <a href="#">{{"Rp " . number_format($item->price,2,',','.')}}</a>
                                        </td>
                                        <td class="qty  text-center">
                                            <a href="#">{{$item->quantity}}</a></td>
                                        @if ($transaksi->status == 'success')
                                        <td class="product-action text-center"> <button type="button"
                                                data-id="{{$item->product->id}}" class="btn btn-primary review"
                                                data-toggle="modal" data-target="#ModalLoginForm">
                                                review
                                            </button></td>
                                        @endif

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                        <div class="cart_totals pt-5">
                            <h2>totals</h2>
                            <table class="shop_table shop_table_responsive" cellspacing="0">
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>Subtotal</th>
                                        <td data-title="Subtotal"><span class="kobolg-Price-amount amount"><span
                                                    class="kobolg-Price-currencySymbol">{{"Rp " . number_format($transaksi->sub_total,2,',','.')}}</span>
                                        </td>
                                    </tr>
                                    <tr class="cart-shipng">
                                        <th>Ongkos Kirim</th>
                                        <td data-title="shipig"><span class="kobolg-Price-amount amount"><span
                                                    class="kobolg-Price-currencySymbol">{{"Rp " . number_format($transaksi->shipping_cost,2,',','.')}}</span>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Total</th>
                                        <td data-title="Total"><strong><span class="kobolg-Price-amount amount"><span
                                                        class="kobolg-Price-currencySymbol">{{"Rp " . number_format($transaksi->total,2,',','.')}}</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
<div id="ModalLoginForm" class="modal fade">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title">Berikan Ulasan</h1>
            </div>
            <div class="modal-body">
                <h4 for="Rating" class="text-center">Rating</h4>
                <div class="form-group row col-lg-4 col-12 mx-auto ">

                    <select class="star-rating" id="rate" name="rate">
                        <option value="">Select a rating</option>
                        <option value="5">Excellent</option>
                        <option value="4">Very Good</option>
                        <option value="3">Average</option>
                        <option value="2">Poor</option>
                        <option value="1">Terrible</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ulasan">Ulasan</label>
                    <textarea class="form-control" name="content" id="content" cols="5" rows="5"></textarea>

                </div>
                <button type="button" id="btn-submit" data-id="">Submit</button>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@endsection
@section('scripts')
<script>
    var starrating = new StarRating('.star-rating',{
            classNames: {
        active: "gl-active",
        base: "gl-star-rating",
        selected: "gl-selected",
    },
            clearable: true,
    maxStars: 10,
    stars: null,
    tooltip: 'Select a Rating',
         });

         $(document).on('click','.review', function () {
      var id = $(this).data('id');
      console.log(id);
      $('#btn-submit').attr('data-id', id);
    });

    function resetMyForm(){
        starrating.rebuild();
        destroyed = false;
        $('span.gl-star-rating--stars').removeAttr('class').addClass('gl-star-rating--stars s0');
        $('span.gl-star-rating--stars').removeAttr('aria-label').attr('aria-label','Select a Rating');
		$('textarea').val(''); 
}
    $('#btn-submit').click(function(){
		var id = $(this).attr('data-id');
		var rate = $('#rate').val();
		var content = $('#content').val();
		$.ajax({
			url: '{{Route("store-review")}}',
			type: 'post',
			data: {id: id, rate : rate,content : content},
			success: function(data){
				 $('#ModalLoginForm').modal('hide');
                 toastr.success(data);
                    resetMyForm();
                   

        console.log('berhasil memasukan ulasan');
            
			}
		});
	});
    @if(!$transaksi->proof_of_payment && $transaksi->status == 'unverified')
         CountDownTimer('{{$transaksi->created_at}}', 'countdown');
    function CountDownTimer(dt, id)
    {
        var end = new Date('{{$transaksi->timeout}}');
        var _second = 1000;
        var _minute = _second * 60;
        var _hour = _minute * 60;
        var _day = _hour * 24;
        var timer;
        function showRemaining() {
            var now = new Date();
            var distance = end - now;
            if (distance < 0) {

                clearInterval(timer);

                return;
            }
            var days = Math.floor(distance / _day);
            var hours = Math.floor((distance % _day) / _hour);
            var minutes = Math.floor((distance % _hour) / _minute);
            var seconds = Math.floor((distance % _minute) / _second);

            document.getElementById(id).innerHTML = days + ' days ';
            document.getElementById(id).innerHTML += hours + ' hrs ';
            document.getElementById(id).innerHTML += minutes + ' mins ';
            document.getElementById(id).innerHTML += seconds + ' secs';
            document.getElementById(id).innerHTML +='<h2>BATAS WAKTU PEMBAYARAN';
        }
        timer = setInterval(showRemaining, 1000);
    }
    @endif
</script>
@endsection