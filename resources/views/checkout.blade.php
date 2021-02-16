<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <label for="Provinsi">Provinsi</label>
    <select id="provinsi" name="" id="">
        <option value="" selected disabled>Pilih Provinsi</option>
        @foreach ($provinsis as $provinsi)
        <option value="{{$provinsi->id}}">{{$provinsi->title}}</option>
        @endforeach
    </select>

    <label for="Kota">Kota</label>
    <select id="kota" name="kota" disabled>
        <option value="" selected disabled>Pilih Kota</option>
    </select>
    <label for="Alamat">Alamat</label>
    <textarea name="" id="" cols="30" rows="10"></textarea>

    <label for="Kurir">Kurir</label>
    <select name="kurir" id="kurir">
        <option value="" selected disabled>Pilih Kurir</option>
        @foreach ($kurirs as $kurir)
        <option value="{{$kurir->code}}">{{$kurir->courier}}</option>
        @endforeach
    </select>

    <label for="Layanan">Layanan</label>
    <select name="layanan" id="layanan">
        <option value="" selected disabled>Pilih Layanan</option>
    </select>

    <hr>
    <h1>Data Barang</h1>
    <p id="berat" data-berat="{{$total->berattotal}}"> Total Berat : {{$total->berattotal}} kg</p>
    <p> Total Harga : Rp.{{$total->total}}</p>
    <p> ongkos kirim : Rp. <span  id="ongkir">0</span></p>
    <hr>
    @foreach ($carts as $cart)

    <p>Nama Barang: {{$cart->name}}</p>
    <p>qty: {{$cart->quantity}}</p>
    <p>berat: {{$cart->berattotal}} kg</p>
    <p>harga:Rp.{{$cart->hargatotal}}</p>
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
        var id = $(this).val();
        var html_option ='';
        $('#kota').prop("disabled", false);
        $.ajax({
			url: '{{Route("getkota")}}',
			type: 'get',
			data: {id: id},
            dataType: 'json',
			success: function(data){
                $.each(data.kota, function(i, kotas) {
            html_option += '<option value='+kotas.city_id+'>'+kotas.title+'</option>'
        });
        $('#kota').html(html_option);
			}
		});
});
$('#kurir').change(loadongkir).change();
$('#kota').change(loadongkir).change();

function loadongkir(){
        var kurir = $('#kurir').val();
        var kota = $('#kota').val();
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
$('select[name="layanan"]').empty();
// ini untuk looping data result nya
$.each(data, function(key, value){
// ini looping data layanan misal jne reg, jne oke, jne yes
$.each(value.costs, function(key1, value1){
// ini untuk looping cost nya masing masing
// silahkan pelajari cara menampilkan data json agar lebi paham
$.each(value1.cost, function(key2, value2){
$('select[name="layanan"]').append('<option value="'+ key +'">' + value1.service + '-' + value1.description +'</option>');
$('#ongkir').html(value2.value);
});
});
});
}
		});
    };

    </script>
</body>

</html>