{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    nama product : {{$products->product_name}}
<hr>
<h3>review</h3>

@foreach ($products->reviews as $review)
<div class="review">
    <div class="name-user">
        <p> {{$review->user->name}}</p>
    </div>
    <div class="content">
        <p> {{$review->content}}</p>
    </div>
    <button class="btn-reply" data-id="{{$review->id}}">Balas</button>
</div>
<hr>
@endforeach
</body>

</html> --}}
@extends('layouts/master')
@section('content')
<div class="banner-wrapper no_background">
    <div class="banner-wrapper-inner">
        <nav class="kobolg-breadcrumb container"><a href="index.html">Home</a><i class="fa fa-angle-right"></i><a
                href="#">Shop</a>
            <i class="fa fa-angle-right"></i>Single Product
        </nav>
    </div>
</div>
<div class="single-thumb-vertical main-container shop-page no-sidebar">
    <div class="container">
        <div class="row">
            <div class="main-content col-md-12">
                <div class="kobolg-notices-wrapper"></div>
                <div id="product-27"
                    class="post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-variable has-default-attributes">
                    <div class="main-contain-summary">
                        <div class="contain-left has-gallery">
                            <div class="single-left">
                                <div
                                    class="kobolg-product-gallery kobolg-product-gallery--with-images kobolg-product-gallery--columns-4 images">
                                    <a href="#" class="kobolg-product-gallery__trigger">
                                        <img draggable="false" class="emoji" alt="🔍"
                                            src="/https://s.w.org/images/core/emoji/11/svg/1f50d.svg"></a>
                                    <div class="flex-viewport">
                                        <figure class="kobolg-product-gallery__wrapper">
                                            @foreach ($products->product_image as $immage)

                                            <div class="kobolg-product-gallery__image">
                                                <img alt="img" src="/assets/images/apro131-2.jpg">
                                            </div>
                                                                                           
                                            @endforeach
                                        </figure>
                                    </div>
                                    <ol class="flex-control-nav flex-control-thumbs">
                                        @foreach ($products->product_image as $immage)

                                        <li><img src="/assets/images/apro131-2-100x100.jpg" alt="img">
                                        </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            <div class="summary entry-summary">
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <h1 class="product_title entry-title">{{$products->product_name}}</h1>
                                <p class="price"><span
                                        class="kobolg-Price-amount amount">{{"Rp " . number_format($products->price,2,',','.')}}</span>
                                </p>
                                <p class="stock in-stock">
                                    Availability: <span>{{$products->stock}} In stock</span>
                                </p>



                                    <div class="single_variation_wrap">
                                        <div class="kobolg-variation single_variation"></div>
                                        <div class="kobolg-variation-add-to-cart variations_button d-flex align-items-center">
                                            <form action="{{Route('beli-product')}}" method="POST">
                                                @csrf
                                                <div class="d-flex align-items-center">
                                                <div class="quantity m-0 mr-3 ">
                                                    <span class="qty-label">Quantiy:</span>
                                                    <div class="control">
                                                        <div>
                                                            <input type="hidden" name="id" value="{{$products->id}}">
                                                            <div data-min="0"
                                                                class="dec button btn-number qtyplus quantity-minus">-
                                                            </div>
                                                            <input type="text" class="incdec input-qty input-text"
                                                                name="qty"
                                                                value="0" />
                                                            <div class="inc button btn-number qtyplus quantity-plus"
                                                                data-max="{{$products->stock}}">+</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <button type="submit"
                                                class="single_add_to_cart_button button alt kobolg-variation-selection-needed">
                                               Beli Sekarang
                                            </button>
                                        </div>
                                        </form>
                                        </div>
                                    </div>
                          

                                <div class="clear"></div>

                                <div class="product_meta">

                                    <span class="sku_wrapper">Berat: <span class="weight">{{$products->weight}}
                                            g</span></span>
                                    <span class="posted_in">
                                        Categories:
                                        @foreach ($products->category as $category)
                                        <a href="#" rel="tag">{{$category->category_name}}</a></span>

                                    @endforeach

                                    <span class="rating">
                                        Rating:
                                        @if (!$avgrate->isEmpty())

                                        @foreach ($avgrate as $item)

                                        @for ($i = 0; $i < 5; $i++) @if (floor($item->AverageRating) - $i >= 1)
                                            {{--Full Start--}}
                                            <i class="fas fa-star text-warning"> </i>
                                            @elseif ($item->AverageRating - $i > 0)
                                            {{--Half Start--}}
                                            <i class="fas fa-star-half-alt text-warning"> </i>
                                            @else
                                            {{--Empty Start--}}
                                            <i class="far fa-star text-warning"> </i>
                                            @endif
                                            @endfor
                                            @endforeach {{--Start Rating--}}

                                            @else
                                            @for ($i = 0; $i < 5; $i++) <i class="far fa-star"> </i>
                                                @endfor
                                                @endif

                                                {{--End Rating--}}

                                    </span>

                                </div>
                                <hr>
                                
                            </div>
                        </div>
                    </div>
                    <div class="kobolg-tabs kobolg-tabs-wrapper">
                        <ul class="tabs dreaming-tabs" role="tablist">
                            <li class="description_tab active" id="tab-title-description" role="tab"
                                aria-controls="tab-description">
                                <a href="#tab-description">Description</a>
                            </li>
                        
                            
                            <li class="reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews">
                                <a href="#tab-reviews">Reviews ({{$products->reviews->count()}})</a>
                            </li>
                        </ul>
                        <div class="kobolg-Tabs-panel kobolg-Tabs-panel--description panel entry-content kobolg-tab"
                            id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                            <h2>Description</h2>
                           
                            {{$products->description}}
                        </div>
                  
                        <div class="kobolg-Tabs-panel kobolg-Tabs-panel--reviews panel entry-content kobolg-tab"
                            id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                            <div id="reviews" class="kobolg-Reviews">
                                <div  class="comments-list text-center text-md-left">
                                    @if (!$products->reviews->count())
                                      <div class="d-flex justify-content-center">    
                                        <div class="row mb-5">
                                             <p><strong>Belum ada review produk.</strong></p> 
                                        </div>
                                      </div>
                                    @else
                                      @foreach ($products->reviews as $item)
                                        <!-- First row -->
                                        
                                        <div class="row mb-5">
                                          
                                          <!-- Image column -->
                                          <div class="col-sm-2 col-12 mb-3">
                            
                                            <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="sample image" class="avatar rounded-circle z-depth-1-half">
                            
                                          </div>
                                          <!-- Image column -->
                            
                                          <!-- Content column -->
                                          <div class="col-sm-10 col-12">
                            
                                            <a>
                                              <h5 style="color:#333333" class="user-name font-weight-bold">{{$item->user->name}} 
                                                <hr>  
                                            </h5>
                                            </a>
                                            
                                            <!-- Rating -->
                                           
                                              @for ($i = 0; $i < $item->rate; $i++)
                                                
                                                  <i class="fas fa-star text-warning"></i>
                                                
                                              @endfor

                                            <div class="card-data">
                                              <ul class="list-unstyled mb-1">
                                                <li class="comment-date font-small grey-text">
                                                  <i class="far fa-clock-o"></i> {{$item->created_at}}</li>
                                              </ul>
                                            </div>
                            
                                            <p class="dark-grey-text article">{{$item->content}}</p>
                            
                                          </div>
                                          <!-- Content column -->
                            
                                        </div>
                                        <!-- First row -->
                                            @if ($item->response->count())
                                              <!-- Balasan -->
                                              @foreach ($item->response as $balasan)
                                              <div class="row mb-5 ml-5">
                                                
                                                <!-- Image column -->
                                                <div class="col-sm-2 col-12 mb-3">
                            
                                                  <img src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg" alt="sample image" class="avatar rounded-circle z-depth-1-half">
                            
                                                </div>
                                                <!-- Image column -->
                            
                                                <!-- Content column -->
                                                <div class="col-sm-10 col-12">
                            
                                                  <a>
                            
                                                    <h5  class="user-name font-weight-bold"><span  class="mr-2 badge success-color">Admin</span>komang</h5>
                            
                                                  </a>
                                                  <hr>
                                                  <!-- Rating -->
                                                  <div class="card-data">
                                                    <ul class="list-unstyled mb-1">
                                                      <li class="comment-date font-small grey-text">
                                                        <i class="far fa-clock-o"></i> {{$balasan->created_at}}</li>
                                                    </ul>
                                                  </div>
                            
                                                  <p class="dark-grey-text article">{{$balasan->content}}</p>
                            
                                                </div>
                                                <!-- Content column -->
                            
                                              </div>
                            
                                              @endforeach
                                              <!-- Balasan -->
                            
                                            @endif
                            
                                      @endforeach
                            
                                    @endif
                            
                                            </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 dreaming_related-product">
                <div class="block-title">
                    <h2 class="product-grid-title">
                        <span>Related Products</span>
                    </h2>
                </div>
                <div class="owl-slick owl-products equal-container better-height"
                    data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4}"
                    data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                    <div
                        class="product-item style-01 post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock  instock shipping-taxable purchasable product-type-variable has-default-attributes ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#" tabindex="0">
                                    <img class="img-responsive" src="/assets/images/apro101-1-600x778.jpg"
                                        alt="Mac 27 Inch" width="600" height="778">
                                </a>
                                <div class="flash"><span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="0">Mac 27 Inch</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span>
                                </div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>60.00</span></span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="product-item style-01 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple  ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#" tabindex="0">
                                    <img class="img-responsive" src="/assets/images/apro41-1-600x778.jpg"
                                        alt="White Watches" width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="0">White Watches</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span>
                                </div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>134.00</span></span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="product-item style-01 post-35 product type-product status-publish has-post-thumbnail product_cat-chair product_cat-new-arrivals product_cat-lamp product_tag-light product_tag-hat product_tag-sock first instock shipping-taxable purchasable product-type-simple  ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#" tabindex="0">
                                    <img class="img-responsive" src="/assets/images/apro151-1-600x778.jpg"
                                        alt="Cellphone Factory" width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onsale"><span class="number">-11%</span></span>
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="0">Cellphone Factory</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span>
                                </div>
                                <span class="price"><del><span class="kobolg-Price-amount amount"><span
                                                class="kobolg-Price-currencySymbol">$</span>89.00</span></del>
                                    <ins><span class="kobolg-Price-amount amount"><span
                                                class="kobolg-Price-currencySymbol">$</span>79.00</span></ins></span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="product-item style-01 post-25 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-specials product_tag-light product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#" tabindex="-1">
                                    <img class="img-responsive" src="/assets/images/apro13-1-600x778.jpg"
                                        alt="Meta Watches                                                " width="600"
                                        height="778">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="-1">Meta Watches </a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span>
                                </div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>109.00</span></span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="product-item style-01 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock last instock shipping-taxable purchasable product-type-simple ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#" tabindex="-1">
                                    <img class="img-responsive" src="/assets/images/apro181-2-600x778.jpg"
                                        alt="Red Mouse" width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Add to
                                            cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="-1">City
                                        life jumpers</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span>
                                </div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>98.00</span></span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="product-item style-01 post-22 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_cat-lamp product_tag-table product_tag-hat product_tag-sock first instock featured downloadable shipping-taxable purchasable product-type-simple ">
                        <div class="product-inner tooltip-left">
                            <div class="product-thumb">
                                <a class="thumb-link" href="#" tabindex="-1">
                                    <img class="img-responsive" src="/assets/images/apro171-1-600x778.jpg"
                                        alt="Photo Camera" width="600" height="778">
                                </a>
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span></div>
                              
                                <div class="group-button">
                                    <div class="yith-wcwl-add-to-wishlist">
                                        <div class="yith-wcwl-add-button show">
                                            <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                        </div>
                                    </div>
                                    <div class="kobolg product compare-button">
                                        <a href="#" class="compare button">Compare</a>
                                    </div>
                                    <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    <div class="add-to-cart">
                                        <a href="#" class="button product_type_variable add_to_cart_button">Select
                                            options</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-info equal-elem">
                                <h3 class="product-name product_title">
                                    <a href="#" tabindex="-1">Photo Camera</a>
                                </h3>
                                <div class="rating-wapper nostar">
                                    <div class="star-rating"><span style="width:0%">Rated <strong
                                                class="rating">0</strong> out of 5</span></div>
                                    <span class="review">(0)</span>
                                </div>
                                <span class="price"><span class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>105.00</span> – <span
                                        class="kobolg-Price-amount amount"><span
                                            class="kobolg-Price-currencySymbol">$</span>110.00</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection