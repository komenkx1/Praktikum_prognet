<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/chosen.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/jquery.scrollbar.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/lightbox.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/magnific-popup.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="/assets/fonts/flaticon.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/megamenu.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/dreaming-attribute.css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="/assets/css/star-rating.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
    <title>Kobolg - HTML Template </title>
</head>

<body>
    @include('layouts/navigations')
    @yield('content')

    <footer id="footer" class="footer style-03">
        <div class="section-001 section-020">
            <div class="container">
                <div class="kobolg-newsletter style-03">
                    <div class="newsletter-inner">
                        <div class="newsletter-info">
                            <div class="newsletter-wrap">
                                <h3 class="title">Newsletter</h3>
                                <h4 class="subtitle">Get Discount 30% Off</h4>
                                <p class="desc">Nam sed felis at eros blandit ultrices et quis quam. In sit amet
                                    molestie
                                    lectus.</p>
                            </div>
                        </div>
                        <div class="newsletter-form-wrap">
                            <div class="newsletter-form-inner">
                                <input class="email email-newsletter" name="email" placeholder="Enter your email ..."
                                    type="email">
                                <a href="#" class="button btn-submit submit-newsletter">
                                    <span class="text">Subscribe</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kobolg-socials style-02">
                    <div class="content-socials">
                        <ul class="socials-list">
                            <li>
                                <a href="https://facebook.com/" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" target="_blank">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.pinterest.com/" target="_blank">
                                    <i class="fa fa-pinterest-p"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-021">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>© Copyright 2020 <a href="#">Kobolg</a>. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <div class="kobolg-listitem style-03">
                            <div class="listitem-inner">
                                <ul class="listitem-list">
                                    <li>
                                        <a href="#" target="_self">
                                            Contact </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_self">
                                            Term &amp; Conditions </a>
                                    </li>
                                    <li>
                                        <a href="#" target="_self">
                                            Shipping </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="footer-device-mobile">
        <div class="wapper">
            <div class="footer-device-mobile-item device-home">
                <a href="index.html">
                    <span class="icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </span>
                    Home
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-wishlist">
                <a href="wishlist.html">
                    <span class="icon">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </span>
                    Wishlist
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-cart">
                <a href="cart.html">
                    <span class="icon">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        <span class="count-icon">
                            0
                        </span>
                    </span>
                    <span class="text">Cart</span>
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-user">
                <a href="my-account.html">
                    <span class="icon">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                    Account
                </a>
            </div>
        </div>
    </div>
    <a href="#" class="backtotop active">
        <i class="fa fa-angle-up"></i>
    </a>
    <script src="/assets/js/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/chosen.min.js"></script>
    <script src="/assets/js/countdown.min.js"></script>
    <script src="/assets/js/jquery.scrollbar.min.js"></script>
    <script src="/assets/js/lightbox.min.js"></script>
    <script src="/assets/js/magnific-popup.min.js"></script>
    <script src="/assets/js/slick.js"></script>
    <script src="/assets/js/jquery.zoom.min.js"></script>
    <script src="/assets/js/threesixty.min.js"></script>
    <script src="/assets/js/jquery-ui.min.js"></script>
    <script src="/assets/js/mobilemenu.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="/assets/js/star-rating.js"></script>
    @yield('scripts')
    <script>
        $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
    function loadcarts(){
    var html_option = '';
	$.ajax({
			url: '{{Route("cart")}}',
			type: 'get',
            success :'success',
			success: function(data){
                html_option += data;
        $('.item-cart').html(html_option);

			}
		});
}

function loadcount(){
	$.ajax({
			url: '{{Route("count-cart")}}',
			type: 'get',
			success: function(data){
                $('.countcarts').html(data);
                if (data < 1) {
                    $('a.button.kobolg-forward').addClass('w-100')
                    $('a.button.checkout.kobolg-forward').addClass('d-none')
                }else{
                    $('a.button.kobolg-forward').removeClass('w-100')
                    $('a.button.checkout.kobolg-forward').removeClass('d-none')
                }
			}
		});
}

function loadtotal(){
	$.ajax({
			url: '{{Route("total-cart")}}',
			type: 'get',
			success: function(data){
                $('span .kobolg-Price-currencySymbol-totals').html(data);
			}
		});
}

            $(document).on('click','.btn-add',function(){
		var id = $(this).data('id');
		var stock = $(this).data('stock');
		$.ajax({
			url: '{{Route("add-cart")}}',
			type: 'post',
			data: {id: id,stock : stock},
			success: function(data){
                loadcount();
                loadcarts();
                loadtotal();
                if (data == 'stok habis') {
                    toastr.error(data);
                }else{
                    toastr.success(data);
                }
               
			}
		});
	});

    $(document).on('click','.delete',function(){
		var id = $(this).data('id');
		$.ajax({
			url: '{{Route("delete-cart")}}',
			type: 'delete',
			data: {id: id},
			success: function(data){
                loadcount();
                loadcarts();
                loadtotal();
                toastr.error(data);
			}
		});
	});
    </script>
    <script src="/assets/js/functions.js"></script>
</body>


</html>