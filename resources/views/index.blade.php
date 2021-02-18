<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @foreach ($products as $product)


    <p>nama : {{$product->product_name}}</p>
    <p class="stock" > stock : {{$product->stock}}</p>
    <button class="btn-add" data-id="{{$product->id}}"  data-stock="{{$product->stock}}">tambah</button>
    <form action="{{Route('beli-product')}}" method="post">
        @csrf
        <button class="btn-add" value="{{$product->id}}" name="id">Beli Sekarang</button>
        <input  type="hidden" value="{{$product->stock}}"  name="stock">
        <input  type="hidden" value="{{$product->id}}"  name="id">
</form>
    @endforeach

    data cart = <p id="countcarts"></p>

    <div class="row" id="pnl-faktur">
        <table class="table table-striped table-bordered" id="table2">
            <thead>
                <tr>
                    <th>Nama Product</th>
                    <th>jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                <tr>
                    <td>{{$cart->name}}</td>
                    <td >{{$cart->quantity}}</td>
                    <td><button class="delete" data-qty="{{$cart->quantity}}" data-id="{{$cart->product_id}}">Hapus</button></td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <td colspan="4" align="right">Total</td>
                <td><input id="total" value="{{$total->total}}" type=text /></td>
            </tfoot>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
function loadcount(){
	$.ajax({
			url: '{{Route("count-cart")}}',
			type: 'get',
			success: function(data){
                $('#countcarts').html(data);
			}
		});
}
function loadtotal(){
	$.ajax({
			url: '{{Route("total-cart")}}',
			type: 'get',
            dataType:'json',
			success: function(total){
                $('#total').val(total[0].total);
			}
		});
}

function loadcarts(){
    var html_option = '';
	$.ajax({
			url: '{{Route("cart")}}',
			type: 'get',
            success :'success',
			success: function(data){
                // console.log(result);
                $.each(data.result, function(i, caritem) {
            html_option += '<tr><td>'+caritem.name+'</td><td>'+caritem.quantity+'</td><td><button class="delete" data-qty="'+caritem.quantity+'">Hapus</button></td></tr>'
        });
        $('#table2 tbody').html(html_option);

			}
		});
}
            $('.btn-add').click(function(){
		var id = $(this).data('id');
		var stock = $(this).data('stock');
		$.ajax({
			url: '{{Route("add-cart")}}',
			type: 'post',
			data: {id: id,stock : stock},
			success: function(data){
				// $('.modal-body-visimisi').html(data);
				// $('#modalVisiMisi').modal('show'); 
                // loadstock();
                loadcount();
                loadcarts();
                loadtotal();
			}
		});
	});

    $('.delete').click(function(){
		var id = $(this).data('id');
		var qty = $(this).data('qty');
        console.log(qty);
		$.ajax({
			url: '{{Route("delete-cart")}}',
			type: 'delete',
			data: {id: id},
			success: function(data){
				// $('.modal-body-visimisi').html(data);
				// $('#modalVisiMisi').modal('show'); 
                // loadstock();
                loadcount();
                loadcarts();
                loadtotal();
			}
		});
	});

    </script>
</body>

</html>