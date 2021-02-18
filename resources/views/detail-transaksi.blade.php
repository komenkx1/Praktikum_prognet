


@if ($transaksi->status == 'canceled')
<h2>Transaksi Dibatalkan</h2>
@elseif ($transaksi->status == 'verified')
<h2>Transaksi Terverifikasi, Barang Akan Segera Dikirim</h2>
@elseif ($transaksi->status == 'delivered')
<h2> Barang Sudah Dikirim</h2>
@elseif ($transaksi->status == 'success')
<h2> Barang Sudah DIterima, Transaksi Success</h2>
@elseif ($transaksi->status == 'expired')
<h2> TRANSAKSI EXPIRED</h2>
@else
@if (!$transaksi->proof_of_payment && $transaksi->status == 'unverified')
<div id="countdown"> </div>
@else
<h2>Bukti Pembayaran DIterima, silahkan tunggu admin memverifikasi bukti pembayaran</h2>
@endif
@endif



<table>
    <thead>
        <th>Nama Product</th>
        <th>Qty</th>
        <th>Price</th>
    
    </thead>
    <tbody>
    @foreach ($transaksidetails as $item)
<tr>

    <td>
        {{$item->Product->product_name}} 
    </td>
    <td>{{$item->quantity}}</td>
    <td>{{$item->price}}</td>
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

<form action="{{Route('verif-barang-diterima',['transactions' => $transaksi->id])}}" method="POST" enctype="multipart/form-data">
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

<form action="{{Route('upload-bukti',['transactions' => $transaksi->id])}}" method="POST" enctype="multipart/form-data">
    @method('put')
@csrf
<label for="upload bukti"></label>
<input type="file" name="proof_of_payment">
<button type="submit">Submit</button>
</form>
    
@endif
<script>
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

