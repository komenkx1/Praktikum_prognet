@extends('layouts/master')
@section('content')
<div class="banner-wrapper has_background">
    <img src="assets/images/banner-for-all2.jpg" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title container">Checkout</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs container">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Checkout</span>
                </li>
            </ul>
        </div>
    </div>
</div>
@if ($errors->has('total'))
<h3 class="text-danger text-center">{{ $errors->first('total') }}</h3>
@elseif($errors->has('sub_total'))
<h3 class="text-danger text-center">{{ $errors->first('sub_total') }}</h3>
@endif

<main class="site-main  main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="kobolg">
                        <div class="kobolg-notices-wrapper"></div>

                        <form action="{{Route('checkout-all')}}" method="post" class="checkout kobolg-checkout"
                            enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="col2-set" id="customer_details">
                                <div class="col-1">
                                    <div class="kobolg-billing-fields">
                                        <h3>Billing details</h3>
                                        <div class="kobolg-billing-fields__field-wrapper">

                                            <p class="form-row form-row-wide addresses-field update_totals_on_change validate-required"
                                                id="billing_province_field" data-priority="40"><label
                                                    for="billing_province" class="">Province&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label>
                                                <span class="kobolg-input-wrapper">
                                                    <select id="provinsi" name="province" required
                                                        class="province_to_state province_select"
                                                        autocomplete="province" tabindex="-1" aria-hidden="true">
                                                        <option value="" selected disabled>Pilih Provinsi</option>
                                                        @foreach ($provinsis as $provinsi)
                                                        <option data-id="{{$provinsi->id}}"
                                                            value="{{$provinsi->title}}">{{$provinsi->title}}</option>
                                                        @endforeach

                                                    </select>
                                                </span>
                                                @if ($errors->has('province'))
                                                <span class="text-danger">{{ $errors->first('province') }}</span>
                                                @endif
                                            </p>

                                            <p class="form-row form-row-wide addresses-field update_totals_on_change validate-required"
                                                id="billing_regency_field" data-priority="40"><label
                                                    for="billing_regency" class="">Kota&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label>
                                                <span class="kobolg-input-wrapper">
                                                    <select id="kota" name="regency" disabled required
                                                        class="regency_to_state regency_select" autocomplete="regency"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option value="" selected disabled>Pilih Kota</option>
                                                    </select>
                                                </span>
                                                @if ($errors->has('regency'))
                                                <span class="text-danger">{{ $errors->first('regency') }}</span>
                                                @endif
                                            </p>
                                            <p class="form-row form-row-wide alamat-field validate-required"
                                                id="billing_alamat_1_field" data-priority="50"><label
                                                    for="billing_alamat_1" class="">Alamat&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label><span
                                                    class="kobolg-input-wrapper"><input required type="text"
                                                        class="input-text " name="address" id="billing_alamat_1"
                                                        placeholder="Alamat Lengkap" value=""
                                                        autocomplete="alamat-line1"
                                                        data-placeholder="Alamat Lengkap"></span>
                                                @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                                @endif
                                            </p>
                                            <p class="form-row form-row-wide alamat-field validate-required"
                                                id="billing_telp_field" data-priority="50"><label for="billing_tepl"
                                                    class="">Nomor Telepon&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label><span
                                                    class="kobolg-input-wrapper"><input required type="text"
                                                        class="input-text " name="telp" id="billing_tepl"
                                                        placeholder="Nomor Telepon" value="" autocomplete="alamat-line1"
                                                        data-placeholder="Nomor Telepon"></span>
                                                @if ($errors->has('telp'))
                                                <span class="text-danger">{{ $errors->first('telp') }}</span>
                                                @endif
                                            </p>
                                            <p class="form-row form-row-wide addresses-field update_totals_on_change validate-required"
                                                id="billing_courier_field" data-priority="40"><label
                                                    for="billing_courier" class="">Kurir&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label>
                                                <span class="kobolg-input-wrapper">
                                                    <select name="courier_id" id="kurir" required>
                                                        <option value="" selected disabled>Pilih Kurir</option>
                                                        @foreach ($kurirs as $kurir)
                                                        <option data-kurir="{{$kurir->code}}" value="{{$kurir->id}}">
                                                            {{$kurir->courier}}</option>
                                                        @endforeach
                                                    </select>
                                                </span>
                                                @if ($errors->has('courier_id'))
                                                <span class="text-danger">{{ $errors->first('courier_id') }}</span>
                                                @endif
                                            </p>
                                            <p class="form-row form-row-wide addresses-field update_totals_on_change validate-required"
                                                id="billing_courier_field" data-priority="40"><label
                                                    for="billing_courier" class="">Layanan&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label>
                                                <span class="kobolg-input-wrapper">
                                                    <select name="shipping_cost" id="layanan" required>
                                                        <option value="" selected disabled>Pilih Layanan</option>
                                                    </select>
                                                </span>
                                                @if ($errors->has('shipping_cost'))
                                                <span class="text-danger">{{ $errors->first('shipping_cost') }}</span>
                                                @endif
                                            </p>

                                        </div>
                                    </div>

                                </div>

                            </div>
                            <h3 id="order_review_heading">Your order</h3>
                            <div id="order_review" class="kobolg-checkout-review-order">
                                <table class="shop_table kobolg-checkout-review-order-table">
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($carts as $cart)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{$cart->products->product_name}}&nbsp;&nbsp; <strong
                                                    class="product-quantity">×
                                                    {{$cart->qty}}</strong></td>
                                            <td class="product-total">
                                                <span class="kobolg-Price-amount amount">
                                                    @php
                                                    $is_discount = false;
                                                    @endphp
                                                    @foreach ($cart->products->discounts as
                                                    $discount)
                                                    @if (date('Y-m-d') >= $discount->start
                                                    && date('Y-m-d') < $discount->end)
                                                        @php
                                                        $diskon = ($discount->percentage /
                                                        100) * $cart->products->price;

                                                        @endphp
                                                        @if ($diskon)
                                                        @php
                                                        $is_discount = true;
                                                        @endphp
                                                        <span id="hargadiskon"
                                                            data-harga="{{$cart->products->price - $diskon}}">{{"Rp " . number_format($cart->products->price - $diskon,2,',','.')}}</span>
                                                        <input type="hidden" name="harga_diskon[]" multiple
                                                            value="{{$cart->products->price - $diskon ?? '0'}}">
                                                        <input type="hidden" name="diskon[]" multiple
                                                            value="{{$discount->percentage}}">
                                                        <br>
                                                        @endif
                                                        @endif

                                                        @endforeach
                                                        @if ($is_discount)
                                                        <small><strike>{{ "Rp " . number_format($cart->products->price, 2, ',', '.')}}</strike></small>
                                                        @else
                                                        <input type="hidden" name="diskon[]" multiple value="0">
                                                        {{"Rp " . number_format($cart->products->price,2,',','.')}}
                                                        <input type="hidden" name="harga_diskon[]" multiple
                                                            value="{{$cart->products->price}}">
                                                        @endif
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Sub Total</th>
                                            <td><span
                                                    class="kobolg-Price-amount amount">{{"Rp " . number_format($total,0,',','.')}}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Ongkir</th>
                                            <td><span class="kobolg-Price-amount amount" id="ongkir">0</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Berat Total</th>
                                            <td><span class="kobolg-Price-amount amount" id="berat"
                                                    data-berat="{{$berattotal}}">{{$berattotal}} g</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span data-total="{{$total}}" id="total"
                                                        class="kobolg-Price-amount amount">{{"Rp " . number_format($total,0,',','.')}}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div id="payment" class="kobolg-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" class="input-radio"
                                                value="bacs" checked="checked" data-order_button_text="">
                                            <label for="payment_method_bacs">
                                                Direct bank transfer </label>
                                            <div class="payment_box payment_method_bacs text-center">
                                                <p>Transfer To : 0988465775</p>
                                            </div>
                                        </li>

                                    </ul>
                                    <div class="form-row place-order">
                                        <noscript>
                                            Since your browser does not support JavaScript, or it is disabled, please
                                            ensure you click the <em>Update Totals</em> button before placing your
                                            order. You may be charged more than the amount stated above if you fail to
                                            do so. <br />
                                            <button type="submit" class="button alt"
                                                name="kobolg_checkout_update_totals" value="Update totals">
                                                Update totals
                                            </button>
                                        </noscript>
                                        <div class="kobolg-terms-and-conditions-wrapper">
                                            <div class="kobolg-privacy-policy-text">
                                                <p>Your personal data will be
                                                    used to process your order, support your experience throughout this
                                                    website, and for other purposes described in our <a href="#"
                                                        class="kobolg-privacy-policy-link" target="_blank">privacy
                                                        policy</a>.</p>
                                            </div>
                                        </div>
                                        <button type="submit" class="button alt" id="place_order" value="Place order"
                                            data-value="Place order">Place
                                            order
                                        </button>
                                        <input type="hidden" id="kobolg-process-checkout-nonce"
                                            value="634590c981"><input type="hidden"
                                            value="/kobolg/?kobolg-ajax=update_order_review">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('scripts')
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
        var kurir = $('#kurir :selected').val();
    if (kurir) {
     loadongkir();
    }
}
    });
});

$('#kota').on('change', function() {
    var kurir = $('#kurir :selected').val();
    if (kurir) {
     loadongkir();
    }
   
});

$('#kurir').on('change', function() {
    loadongkir();
});

$('select[name="shipping_cost"]').on('change', function() {
    loadSubOngkir();
    loadtotals();
});

function loadtotals() {
    var ongkir = $('select[name="shipping_cost"] :selected').val();
    var total = $('#total').attr('data-total');
    var totals = Number(ongkir) + Number(total);
    $('span#total').html('Rp '+format(totals));
}

function loadSubOngkir() {
    var html_option = '';
    html_option += $('select[name="shipping_cost"] :selected').val();
    $('#ongkir').html('Rp '+format(html_option));
}

function loadongkir(){
        var kurir =$('#kurir').find('option:selected').data("kurir");
        var kota = $('#kota').find('option:selected').data("kota");
        var berat = $('#berat').data('berat');
        var html_option = '';
    $.ajax({
			url: '{{Route("cekongkir")}}',
			type: 'post',
			data: {
                kurir: kurir,
                kota: kota,
                berat: berat
                },
                success:function(data){
                    
    $('select[name="shipping_cost"]').html('<option value="" selected>Tidak ada layanan</option>');
                
// looping data result nya
$.each(data, function(key, value){
// looping data layanan misal jne reg, jne oke, jne yes
$.each(value.costs, function(key1, value1){
// untuk looping cost nya masing masing
$.each(value1.cost, function(key2, value2){

    html_option +='<option value="'+ value2.value +'">' + value1.service + '-' + value1.description + '- Rp.' +value2.value+ '</option>';
    $('select[name="shipping_cost"]').html( html_option);
});
loadSubOngkir();
loadtotals();
});
});
}
});
};


</script>
@endsection