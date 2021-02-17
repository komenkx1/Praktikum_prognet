<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <form action="{{Route('checkout-all')}}" method="post">
        @csrf
        <label for="Provinsi">Provinsi</label>
        <select id="provinsi" name="province" id="">
            <option value="" selected disabled>Pilih Provinsi</option>
            @foreach ($provinsis as $provinsi)
            <option data-id="{{$provinsi->id}}" value="{{$provinsi->title}}">{{$provinsi->title}}</option>
            @endforeach
        </select>

        <label for="Kota">Kota</label>
        <select id="kota" name="regency" disabled>
            <option value="" selected disabled>Pilih Kota</option>
        </select>
        <label for="Alamat">Alamat</label>
        <textarea name="address" id="" cols="30" rows="10"></textarea>

        <label for="Kurir">Kurir</label>
        <select name="courier_id" id="kurir">
            <option value="" selected disabled>Pilih Kurir</option>
            @foreach ($kurirs as $kurir)
            <option data-kurir="{{$kurir->code}}" value="{{$kurir->id}}">{{$kurir->courier}}</option>
            @endforeach
        </select>

        <label for="Layanan">Layanan</label>
        <select name="shipping_cost" id="layanan">
            <option value="" selected disabled>Pilih Layanan</option>
        </select>

        <button type="submit">Checkout</button>
    </form>

    <hr>
    <h1>Data Barang</h1>
    <p id="berat" data-berat="{{$total->berattotal}}"> Total Berat : {{$total->berattotal}} kg</p>
    <p> Total Harga : Rp.{{$total->total}}</p>
    <hr>
    @foreach ($carts as $cart)

    <p>Nama Barang: {{$cart->name}}</p>
    <p>qty: {{$cart->quantity}}</p>
    <p>berat: {{$cart->berattotal}} kg</p>
    <p>harga:Rp.{{$cart->hargatotal}}</p>
    <p>harga:Rp.{{$cart->status}}</p>
    <hr>
    @endforeach


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    $('#provinsi').on('change', function() {
        var id = $(this).find('option:selected').data("id");
        var html_option ='';
        $('#kota').prop("disabled", false);
        $.ajax({
			url: '{{Route("getkota")}}',
			type: 'get',
			data: {id: id},
            dataType: 'json',
			success: function(data){
                $.each(data.kota, function(i, kotas) {
            html_option += '<option data-kota='+kotas.city_id+' value='+kotas.title+'>'+kotas.title+'</option>'
        });
        $('#kota').html(html_option);
        loadongkir();
			}
		});
});
// $('#kota').change(loadongkir).change();
// $('#kurir').change().change();
$('#kota').on('change', function() {
    loadongkir();
});
$('#kurir').on('change', function() {
    loadongkir();
});



function loadongkir(){
        var kurir =$('#kurir').find('option:selected').data("kurir");
        var kota = $('#kota').find('option:selected').data("kota");
        var berat = $('#berat').data('berat');
    $.ajax({
			url: '{{Route("cekongkir")}}',
			type: 'post',
			data: {
                kurir: kurir,
                kota: kota,
                berat: berat
                },
                success:function(data){
$('select[name="shipping_cost"]').empty();
// looping data result nya
$.each(data, function(key, value){
// looping data layanan misal jne reg, jne oke, jne yes
$.each(value.costs, function(key1, value1){
// untuk looping cost nya masing masing
$.each(value1.cost, function(key2, value2){
$('select[name="shipping_cost"]').append('<option value="'+ value2.value +'">' + value1.service + '-' + value1.description + '- Rp.' +value2.value+ '</option>');

});
});
});
}
		});
    };

    </script>
</body>

</html>