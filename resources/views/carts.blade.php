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
                        <form class="kobolg-cart-form">
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
                                            <a href="#" class="remove" aria-label="Remove this item"
                                                data-product_id="27" data-product_sku="885B712">×</a></td>
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
                                                    <a href="#" class="up btn-number qtyplus quantity-plus" value="Up"
                                                        data-max="{{$cart->stock}}">+</a>
                                                    <input type="text" name="incdec" data-price="{{$cart->price}}"
                                                        class="incdec input-qty input-text"
                                                        value="{{$cart->quantity}}" />
                                                    <a href="#" class="down btn-number qtyplus quantity-minus"
                                                        value="Down" data-min="0">-</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span class="kobolg-Price-amount amount subtotal">Rp
                                                {{number_format($cart->price,0,',','.')}}</span></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="actions">
                                            <button type="button"  id="submit" class="button" name="update_cart" value="Update cart"
                                                >Update cart
                                            </button>
                                            
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Cart totals</h2>
                                <table class="shop_table shop_table_responsive" cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td data-title="Subtotal"><span class="kobolg-Price-amount amount"><span
                                                        class="kobolg-Price-currencySymbol">$</span>418.00</span></td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td data-title="Total"><strong><span
                                                        class="kobolg-Price-amount amount"><span
                                                            class="kobolg-Price-currencySymbol">$</span>418.00</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="kobolg-proceed-to-checkout">
                                    <a href="#" class="checkout-button button alt kobolg-forward">
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
    var price;
var qty;
var total;

    var format = function(num){
      var str = num.toString().replace("", ""), parts = false, output = [], i = 1, formatted = null;
      if(str.indexOf(".") > 0) {
        parts = str.split(".");
        str = parts[0];
      }
      str = str.split("").reverse();
      for(var j = 0, len = str.length; j < len; j++) {
        if(str[j] != ".") {
          output.push(str[j]);
          if(i%3 == 0 && j < (len - 1)) {
            output.push(".");
          }
          i++;
        }
      }
      formatted = output.reverse().join("");
      return("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };

price = $('.incdec').data('price'); 


$(".up").on('click',function(){
    var max = $(this).data("max");
      if ($(".incdec").val() < $(this).data("max")) {
        $(".incdec").val(parseInt($(".incdec").val())+1);
        qty = $('.incdec').val();
      }
      total = price * qty;
      console.log();
         $('.kobolg-Price-amount.amount.subtotal').html('Rp '+format(total));
});

$(".down").on('click',function(){
      if ($(".incdec").val() > $(this).data("min")) {
        $(".incdec").val(parseInt($(".incdec").val())-1);
        qty = $('.incdec').val();
      }
      total = price * qty;
      console.log(total);
         $('.kobolg-Price-amount.amount.subtotal').html('Rp '+format(total));
});

$(document).on('click','#submit',function(){
		var qty = $('.incdec').val();
		// $.ajax({
		// 	url: '{{Route("add-cart")}}',
		// 	type: 'post',
		// 	data: {id: id,stock : stock},
		// 	success: function(data){
        //         loadcount();
        //         loadcarts();
        //         loadtotal();
        //         if (data == 'stok habis') {
        //             toastr.error(data);
        //         }else{
        //             toastr.success(data);
        //         }
               
		// 	}
		// });
	});
</script>
@endsection