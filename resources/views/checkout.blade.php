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
                                                        class="province_to_state province_select" autocomplete="province"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option value="" selected disabled>Pilih Provinsi</option>
                                                        @foreach ($provinsis as $provinsi)
                                                        <option data-id="{{$provinsi->id}}" value="{{$provinsi->title}}">{{$provinsi->title}}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-wide addresses-field update_totals_on_change validate-required"
                                                id="billing_regency_field" data-priority="40"><label
                                                    for="billing_regency" class="">Kota&nbsp;<abbr class="required"
                                                        title="required">*</abbr></label>
                                                <span class="kobolg-input-wrapper">
                                                    <select id="kota" name="regency" disabled  required
                                                        class="regency_to_state regency_select" autocomplete="regency"
                                                        tabindex="-1" aria-hidden="true">
                                                        <option value="" selected disabled>Pilih Kota</option>
                                                    </select>
                                                </span>
                                            </p>
                                            <p class="form-row form-row-wide alamat-field validate-required"
                                                id="billing_alamat_1_field" data-priority="50"><label
                                                    for="billing_alamat_1" class="">Alamat&nbsp;<abbr
                                                        class="required" title="required">*</abbr></label><span
                                                    class="kobolg-input-wrapper"><input  required type="text" class="input-text "
                                                    name="address" id="billing_alamat_1"
                                                        placeholder="Alamat Lengkap" value=""
                                                        autocomplete="alamat-line1"
                                                        data-placeholder="Alamat Lengkap"></span>
                                            </p>
                                            <p class="form-row form-row-wide addresses-field update_totals_on_change validate-required"
                                            id="billing_courier_field" data-priority="40"><label
                                                for="billing_courier" class="">Kurir&nbsp;<abbr class="required"
                                                    title="required">*</abbr></label>
                                            <span class="kobolg-input-wrapper">
                                                <select name="courier_id" id="kurir"  required>
                                                    <option value="" selected disabled>Pilih Kurir</option>
                                                    @foreach ($kurirs as $kurir)
                                                    <option data-kurir="{{$kurir->code}}" value="{{$kurir->id}}">{{$kurir->courier}}</option>
                                                    @endforeach
                                                </select>
                                            </span>
                                        </p>
                                        <p class="form-row form-row-wide addresses-field update_totals_on_change validate-required"
                                        id="billing_courier_field" data-priority="40"><label
                                            for="billing_courier" class="">Layanan&nbsp;<abbr class="required"
                                                title="required">*</abbr></label>
                                        <span class="kobolg-input-wrapper">
                                            <select name="shipping_cost" id="layanan"  required>
                                                <option value="" selected disabled>Pilih Layanan</option>
                                            </select>
                                        </span>
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
                                               {{$cart->name}}&nbsp;&nbsp; <strong class="product-quantity">×
                                                    {{$cart->quantity}}</strong></td>
                                            <td class="product-total">
                                                <span class="kobolg-Price-amount amount">{{"Rp " . number_format($cart->subprice,2,',','.')}}</span></td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Berat Total</th>
                                            <td><span class="kobolg-Price-amount amount" id="berat" data-berat="{{$total->berattotal}}">{{$total->berattotal}} Kg</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td><strong><span class="kobolg-Price-amount amount">{{"Rp " . number_format($total->total,2,',','.')}}</span></strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div id="payment" class="kobolg-checkout-payment">
                                    <ul class="wc_payment_methods payment_methods methods">
                                        <li class="wc_payment_method payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" class="input-radio"
                                                 value="bacs" checked="checked"
                                                data-order_button_text="">
                                            <label for="payment_method_bacs">
                                                Direct bank transfer </label>
                                            <div class="payment_box payment_method_bacs">
                                                <p>Make your payment directly into our bank account. Please use your
                                                    Order ID as the payment reference. Your order will not be shipped
                                                    until the funds have cleared in our account.</p>
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
                                        <button type="submit" class="button alt" 
                                            id="place_order" value="Place order" data-value="Place order">Place
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
        loadongkir();
			}
		});
});

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
        console.log(kurir);
        console.log(kota);
        console.log(berat);
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
@endsection