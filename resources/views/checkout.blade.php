<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <form action="" method="post">
        <label for="Provinsi">Provinsi</label>
        <select id="provinsi" name="" id="">
            <option value="" selected disabled>Pilih Provinsi</option>
            @foreach ($provinsis as $provinsi)
            <option value="{{$provinsi->id}}">{{$provinsi->title}}</option>
            @endforeach
        </select>

        <label for="Kota">Kota</label>
        <select id="kota" name="" disabled>
            <option value="" selected disabled>Pilih Kota</option>
        </select>
        <label for="Alamat">Alamat</label>
        <textarea name="" id="" cols="30" rows="10"></textarea>

        <label for="Kurir">Kurir</label>
        <select name="" id="">
            <option value="" selected disabled>Pilih Kurir</option>
            @foreach ($kurirs as $kurir)
            <option value="{{$kurir->id}}">{{$kurir->courier}}</option>
            @endforeach
        </select>
    </form>
    <hr>
    <h1>Data Barang</h1>
    
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
            html_option += '<option value='+kotas.id+'>'+kotas.title+'</option>'
        });
        $('#kota').html(html_option);
			}
		});
});
    </script>
</body>

</html>