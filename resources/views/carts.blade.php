@extends('layouts/master')
@section('content')
<div class="banner-wrapper has_background">
    <img src="assets/images/banner-for-all2.jpg" class="img-responsive attachment-1920x447 size-1920x447" alt="img">
    <div class="banner-wrapper-inner">
        <h1 class="page-title container">Cart</h1>
        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs container">
            <ul class="trail-items breadcrumb">
                <li class="trail-item trail-begin"><a href="index.html"><span>Home</span></a></li>
                <li class="trail-item trail-end active"><span>Cart</span>
                </li>
            </ul>
        </div>
    </div>
</div>
<main class="site-main main-container no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="kobolg">
                        <div class="kobolg-notices-wrapper"></div>
                        <div class="kobolg-cart-form">
                            <table class="shop_table shop_table_responsive cart kobolg-cart-form__contents"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-quantity">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)


                                    <tr class="kobolg-cart-form__cart-item cart_item">
                                        <td class="product-remove">
                                            <form action="{{Route('delete',['cart'=>$cart->id])}}" method="post">
                                                @method('delete')
                                                @csrf
                                            <button type="submit" class="btn btn-danger" aria-label="Remove this item"
                                                data-product_id="27" data-product_sku="885B712"><i class="fa fa-trash"></i></button>
                                            </form>
                                            </td>
                                        <td class="product-thumbnail">
                                            <a href="#"><img src="assets/images/apro134-1-600x778.jpg"
                                                    class="attachment-kobolg_thumbnail size-kobolg_thumbnail" alt="img"
                                                    width="600" height="778"></a></td>
                                        <td class="product-name" data-title="Product">
                                            <a href="#">{{$cart->name}}</a></td>
                                        <td class="product-price" data-title="Price">
                                            <span class="kobolg-Price-amount amount">Rp
                                                {{number_format($cart->price,2,',','.')}}</span></td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity">
                                                <span class="qty-label">Quantiy:</span>
                                                <div class="control">
                                                    <div>
                                                        <input type="hidden" name="id[]" value="{{$cart->id}}">
                                                        <div data-min="1"
                                                            class="dec button btn-number qtyplus quantity-minus">-
                                                        </div>
                                                        <input type="text" class="incdec input-qty input-text"
                                                            name="qty[]" id="value{{$cart->id}}"
                                                            value="{{$cart->quantity}}" data-price="{{$cart->price}}" />
                                                        <div class="inc button btn-number qtyplus quantity-plus"
                                                            data-max="{{$cart->stock}}">+</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span class="kobolg-Price-amount amount subtotal">Rp
                                                {{number_format($cart->subprice,0,',','.')}}</span></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="actions">
                                            <button type="button" id="submit" class="button" name="update_cart"
                                                value="Update cart">Update cart
                                            </button>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Cart totals</h2>
                                <table class="shop_table shop_table_responsive" cellspacing="0">
                                    <tbody>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td data-title="Total">
                                                <strong><span class="kobolg-Price-amount amount sub-total">
                                                        <span
                                                            class="kobolg-Price-currencySymbol-totals">{{"Rp " . number_format($total->total,2,',','.')}}</span>
                                                    </span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                             
                                    

                                <div class="kobolg-proceed-to-checkout @if ($carts->count() < 1) d-none @endif">
                                    <a href="{{Route('checkout')}}" class="checkout-button button alt kobolg-forward">
                                        Proceed to checkout</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('scripts')
<script>
    $(document).on('click','#submit',function(){
    var qty = $('input[name="qty[]"]').map(function(){ 
                    return this.value; 
                }).get();

    var id = $('input[name="id[]"]').map(function(){ 
                    return this.value; 
                }).get();

		$.ajax({
			url: '{{Route("update-cart")}}',
			type: 'post',
            data: {
                        'qty[]': qty,
                        'id[]': id,
                        // other data
                    },
			success: function(data){
                loadcount();
                loadcarts();
                loadtotal();
                if (data == 'stok habis') {
                    toastr.error(data);
                }else{
                    toastr.info(data);
                }
               
			}
		});
	});
</script>
@endsection