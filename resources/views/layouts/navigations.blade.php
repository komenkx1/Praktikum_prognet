<header id="header" class="header style-04 header-dark">

    <div class="header-middle d-lg-none">
        <div class="container">
            <div class="header-middle-inner">

                <div class="header-search-mid">
                    <div class="header-search">
                        <div class="block-search">
                            <form role="search" method="get"
                                class="form-search block-search-form kobolg-live-search-form">
                                <div class="form-content search-box results-search">
                                    <div class="inner">
                                        <input autocomplete="off" class="searchfield txt-livesearch input" name="s"
                                            value="" placeholder="Search here..." type="text">
                                    </div>
                                </div>
                                <input name="post_type" value="product" type="hidden">
                                <input name="taxonomy" value="product_cat" type="hidden">
                                <div class="category">
                                    <select title="product_cat" name="product_cat" id="1771262470"
                                        class="category-search-option" tabindex="-1" style="display: none;">
                                        <option value="0">All Categories</option>
                                        <option class="level-0" value="light">Camera</option>
                                        <option class="level-0" value="chair">Accessories</option>
                                        <option class="level-0" value="table">Game & Consoles</option>
                                        <option class="level-0" value="bed">Life style</option>
                                        <option class="level-0" value="new-arrivals">New arrivals</option>
                                        <option class="level-0" value="lamp">Summer Sale</option>
                                        <option class="level-0" value="specials">Specials</option>
                                        <option class="level-0" value="sofas">Featured</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn-submit">
                                    <span class="flaticon-search"></span>
                                </button>
                            </form><!-- block search -->
                        </div>
                    </div>
                </div>
                <div class="header-control">
                    <div class="header-control-inner">
                        <div class="meta-dreaming">
                            <div class="menu-item block-user block-dreaming kobolg-dropdown">
                                <a class="block-link" href="my-account.html">
                                    <span class="flaticon-profile"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li
                                        class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--dashboard is-active">
                                        <a href="#">Dashboard</a>
                                    </li>
                                    <li
                                        class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--orders">
                                        <a href="#">Orders</a>
                                    </li>
                                    <li
                                        class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--downloads">
                                        <a href="#">Downloads</a>
                                    </li>
                                    <li
                                        class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-addresses">
                                        <a href="#">Addresses</a>
                                    </li>
                                    <li
                                        class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-account">
                                        <a href="#">Account details</a>
                                    </li>
                                    <li
                                        class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--customer-logout">
                                        <a href="#">Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="block-minicart block-dreaming kobolg-mini-cart kobolg-dropdown">
                                <div class="shopcart-dropdown block-cart-link" data-kobolg="kobolg-dropdown">
                                    <a class="block-link link-dropdown" href="cart.html">
                                        <span class="flaticon-online-shopping-cart"></span>
                                        <span class="count">3</span>
                                    </a>
                                </div>
                                <div class="widget kobolg widget_shopping_cart">
                                    <div class="widget_shopping_cart_content">
                                        <h3 class="minicart-title">Your Cart<span class="minicart-number-items">3</span>
                                        </h3>
                                        <ul class="kobolg-mini-cart cart_list product_list_widget">
                                            @foreach ($carts as $cart)
                                            <li class="kobolg-mini-cart-item mini_cart_item">
                                                <a href="#" class="delete remove_from_cart_button">×</a>
                                                <a href="#">
                                                    <img src="/assets/images/apro134-1-600x778.jpg"
                                                        class="attachment-kobolg_thumbnail size-kobolg_thumbnail"
                                                        alt="img" width="600" height="778">T-shirt with skirt –
                                                    Pink&nbsp;
                                                </a>
                                                <span class="quantity">1 × <span
                                                        class="kobolg-Price-amount amount"><span
                                                            class="kobolg-Price-currencySymbol">$</span>150.00</span></span>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <p class="kobolg-mini-cart__total total"><strong>Subtotal:</strong>
                                            <span class="kobolg-Price-amount amount"><span
                                                    class="kobolg-Price-currencySymbol">$</span>418.00</span>
                                        </p>
                                        <p class="kobolg-mini-cart__buttons buttons">
                                            <a href="cart.html" class="button kobolg-forward">Viewcart</a>
                                            <a href="checkout.html" class="button checkout kobolg-forward">Checkout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-wrap-stick">
        <div class="header-position">
            <div class="header-nav">
                <div class="container">
                    <div class="kobolg-menu-wapper"></div>
                    <div class="header-nav-inner">
                        <div class="header-logo-menu">
                            <div class="block-menu-bar">
                                <a class="menu-bar menu-toggle" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                            <div class="header-logo mt-2">
                                <a href="index.html"><img alt="Kobolg" src="/assets/images/logo.png" class="logo"></a>
                            </div>
                        </div>
                        <div class="box-header-nav menu-nocenter">
                            <ul id="menu-primary-menu"
                                class="clone-main-menu kobolg-clone-mobile-menu kobolg-nav main-menu">
                                <li id="menu-item-230"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-230 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kobolg-menu-item-title" title="Home" href="index.html">Home</a>
                                    <span class="toggle-submenu"></span>
                                    <div class="submenu megamenu megamenu-home">
                                        <div class="demo-item">
                                            <div class="row">
                                                <div class="col-md-6 col-lg-4 col-sm-6">
                                                    <div
                                                        class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                        <figure class="dreaming_wrapper az_figure">
                                                            <a href="index.html" target="_self"
                                                                class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg">
                                                                <img src="/assets/images/demo001.jpg"
                                                                    class="az_single_image-img attachment-full"
                                                                    alt="img">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <h5 class="az_custom_heading">
                                                        <a href="index.html">Home 01</a>
                                                    </h5>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-sm-6">
                                                    <div
                                                        class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                        <figure class="dreaming_wrapper az_figure">
                                                            <a href="home-02.html" target="_self"
                                                                class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg ">
                                                                <img src="/assets/images/demo002.jpg"
                                                                    class="az_single_image-img attachment-full"
                                                                    alt="img"></a>
                                                        </figure>
                                                    </div>
                                                    <h5 class="az_custom_heading">
                                                        <a href="home-02.html">Home 02</a>
                                                    </h5>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-sm-6">
                                                    <div
                                                        class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                        <figure class="dreaming_wrapper az_figure">
                                                            <a href="home-03.html" target="_self"
                                                                class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg">
                                                                <img src="/assets/images/demo003.jpg"
                                                                    class="az_single_image-img attachment-full"
                                                                    alt="img">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <h5 class="az_custom_heading">
                                                        <a href="home-03.html">Home 03</a>
                                                    </h5>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-sm-6">
                                                    <div
                                                        class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                        <figure class="dreaming_wrapper az_figure">
                                                            <a href="home-04.html" target="_self"
                                                                class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg ">
                                                                <img src="/assets/images/demo004.jpg"
                                                                    class="az_single_image-img attachment-full"
                                                                    alt="img">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <h5 class="az_custom_heading">
                                                        <a href="home-04.html">Home 04</a></h5>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-sm-6">
                                                    <div
                                                        class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                        <figure class="dreaming_wrapper az_figure">
                                                            <a href="home-05.html" target="_self"
                                                                class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg">
                                                                <img src="/assets/images/demo005.jpg"
                                                                    class="az_single_image-img attachment-full"
                                                                    alt="img">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <h5 class="az_custom_heading">
                                                        <a href="home-05.html">Home 05</a>
                                                    </h5>
                                                </div>
                                                <div class="col-md-6 col-lg-4 col-sm-6">
                                                    <div
                                                        class="dreaming_single_image dreaming_content_element az_align_left shadow-img">
                                                        <figure class="dreaming_wrapper az_figure">
                                                            <a href="home-06.html" target="_self"
                                                                class="az_single_image-wrapper az_box_border_grey effect normal-effect dark-bg ">
                                                                <img src="/assets/images/demo006.jpg"
                                                                    class="az_single_image-img attachment-full"
                                                                    alt="img">
                                                            </a>
                                                        </figure>
                                                    </div>
                                                    <h5 class="az_custom_heading">
                                                        <a href="home-06.html">Home 06</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li id="menu-item-228"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-228 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kobolg-menu-item-title" title="Shop" href="shop.html">Shop</a>
                                    <span class="toggle-submenu"></span>
                                    <div class="submenu megamenu megamenu-shop">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">Shop Layouts </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="shop.html" target="_self">Shop Grid </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-list.html" target="_self">
                                                                    <span class="image">
                                                                        <img src="/assets/images/label-new.jpg"
                                                                            class="attachment-full size-full" alt="img">
                                                                    </span>
                                                                    Shop List
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop.html" target="_self">No Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-leftsidebar.html" target="_self">Left
                                                                    Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="shop-rightsidebar.html" target="_self">Right
                                                                    Sidebar </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">Product Layouts </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="single-product.html" target="_self">Vertical
                                                                    Thumbnails </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-policy.html" target="_self">
                                                                    <span class="image">
                                                                        <img src="/assets/images/label-new.jpg"
                                                                            class="attachment-full size-full" alt="img">
                                                                    </span>
                                                                    Extra Sidebar
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-rightsidebar.html"
                                                                    target="_self">
                                                                    Right Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-leftsidebar.html"
                                                                    target="_self">
                                                                    Left Sidebar </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">
                                                            Product Extends </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="single-product-bundle.html" target="_self">
                                                                    <span class="image">
                                                                        <img src="/assets/images/label-new.jpg"
                                                                            class="attachment-full size-full" alt="img">
                                                                    </span>
                                                                    Product Bundle
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-360deg.html" target="_self">
                                                                    <span class="image">
                                                                        <img src="/assets/images/label-hot.jpg"
                                                                            class="attachment-full size-full" alt="img">
                                                                    </span>
                                                                    Product 360 Deg </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-video.html" target="_self">
                                                                    Video </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">
                                                            Other Pages </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="cart.html">Cart </a>
                                                            </li>
                                                            <li>
                                                                <a href="wishlist.html" target="_self">Wishlist </a>
                                                            </li>
                                                            <li>
                                                                <a href="checkout.html" target="_self">Checkout </a>
                                                            </li>
                                                            <li>
                                                                <a href="order-tracking.html" target="_self">Order
                                                                    Tracking </a>
                                                            </li>
                                                            <li>
                                                                <a href="my-account.html" target="_self">My Account </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">
                                                            Product Types </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="single-product-simple.html" target="_self">
                                                                    Simple </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product.html" target="_self">
                                                                    <span class="image"><img
                                                                            src="/assets/images/label-hot.jpg"
                                                                            class="attachment-full size-full"
                                                                            alt="img"></span>
                                                                    Variable </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-external.html" target="_self">
                                                                    External / Affiliate </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-group.html" target="_self">
                                                                    Grouped </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-outofstock.html" target="_self">
                                                                    Out Of Stock </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-product-onsale.html" target="_self">
                                                                    On Sale </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li id="menu-item-229"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-229 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kobolg-menu-item-title" title="Elements" href="#">Elements</a>
                                    <span class="toggle-submenu"></span>
                                    <div class="submenu megamenu megamenu-elements">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">Element 1 </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="banner.html" target="_self">Banner </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-element.html" target="_self">Blog Element
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="categories-element.html" target="_self">
                                                                    Categories Element </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-element.html" target="_self">
                                                                    Product Element </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">
                                                            Element 2 </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="client.html" target="_self">
                                                                    Client </a>
                                                            </li>
                                                            <li>
                                                                <a href="product-layout.html" target="_self">
                                                                    Product Layout </a>
                                                            </li>
                                                            <li>
                                                                <a href="google-map.html" target="_self">
                                                                    Google map </a>
                                                            </li>
                                                            <li>
                                                                <a href="iconbox.html" target="_self">
                                                                    Icon Box </a>
                                                            </li>
                                                            <li>
                                                                <a href="team.html" target="_self">
                                                                    Team </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">
                                                            Element 3 </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="instagram-feed.html" target="_self">
                                                                    Instagram Feed </a>
                                                            </li>
                                                            <li>
                                                                <a href="newsletter.html" target="_self">
                                                                    Newsletter </a>
                                                            </li>
                                                            <li>
                                                                <a href="testimonials.html" target="_self">
                                                                    Testimonials </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li id="menu-item-996"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-996 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="kobolg-menu-item-title" title="Blog" href="blog.html">Blog</a>
                                    <span class="toggle-submenu"></span>
                                    <div class="submenu megamenu megamenu-blog">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">
                                                            Blog Layout </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="blog.html" target="_self">No Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-leftsidebar.html" target="_self">Left
                                                                    Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-rightsidebar.html" target="_self">Right
                                                                    Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog.html" target="_self">Blog Standard </a>
                                                            </li>
                                                            <li>
                                                                <a href="blog-grid.html" target="_self">Blog Grid </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">
                                                            Post Layout </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="single-post.html" target="_self">No
                                                                    Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-post-leftsidebar.html"
                                                                    target="_self">Left
                                                                    Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-post-rightsidebar.html"
                                                                    target="_self">Right
                                                                    Sidebar </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-post-instagram.html" target="_self">
                                                                    <span class="image">
                                                                        <img src="/assets/images/label-hot.jpg"
                                                                            class="attachment-full size-full" alt="img">
                                                                    </span>
                                                                    Instagram In Post
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-post-product.html" target="_self">
                                                                    <span class="image">
                                                                        <img src="/assets/images/label-new.jpg"
                                                                            class="attachment-full size-full" alt="img">
                                                                    </span>
                                                                    Product In Post
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="kobolg-listitem style-01">
                                                    <div class="listitem-inner">
                                                        <h4 class="title">
                                                            Post Format </h4>
                                                        <ul class="listitem-list">
                                                            <li>
                                                                <a href="single-post.html" target="_self">Standard </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-post-gallery.html"
                                                                    target="_self">Gallery </a>
                                                            </li>
                                                            <li>
                                                                <a href="single-post-video.html" target="_self">
                                                                    <span class="image">
                                                                        <img src="/assets/images/label-hot.jpg"
                                                                            class="attachment-full size-full" alt="img">
                                                                    </span>
                                                                    Video
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li id="menu-item-237"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-237 parent">
                                    <a class="kobolg-menu-item-title" title="Pages" href="#">Pages</a>
                                    <span class="toggle-submenu"></span>
                                    <ul role="menu" class="submenu">
                                        <li id="menu-item-987"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-987">
                                            <a class="kobolg-menu-item-title" title="About" href="about.html">About</a>
                                        </li>
                                        <li id="menu-item-988"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-988">
                                            <a class="kobolg-menu-item-title" title="Contact"
                                                href="contact.html">Contact</a></li>
                                        <li id="menu-item-990"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-990">
                                            <a class="kobolg-menu-item-title" title="Page 404" href="404.html">Page
                                                404</a></li>
                                    </ul>
                                </li>
                                <li id="menu-item-238"
                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-238">
                                    <div class="header-control d-none d-lg-block">
                                        <div class="header-control-inner">
                                            <div class="meta-dreaming">
                                                <div class="menu-item block-user block-dreaming kobolg-dropdown">
                                                    <a class="block-link" href="my-account.html">
                                                        <span class="flaticon-profile"></span>
                                                    </a>
                                                    <ul class="sub-menu">
                                                        <li
                                                            class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--dashboard is-active">
                                                            <a href="#">Dashboard</a>
                                                        </li>
                                                        <li
                                                            class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--orders">
                                                            <a href="#">Orders</a>
                                                        </li>
                                                        <li
                                                            class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--downloads">
                                                            <a href="#">Downloads</a>
                                                        </li>
                                                        <li
                                                            class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-addresses">
                                                            <a href="#">Addresses</a>
                                                        </li>
                                                        <li
                                                            class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-account">
                                                            <a href="#">Account details</a>
                                                        </li>
                                                        <li
                                                            class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--customer-logout">
                                                            <a href="#">Logout</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div
                                                    class="block-minicart block-dreaming kobolg-mini-cart kobolg-dropdown">
                                                    <div class="shopcart-dropdown block-cart-link"
                                                        data-kobolg="kobolg-dropdown">
                                                        <a class="block-link link-dropdown" href="cart.html">
                                                            <span class="flaticon-online-shopping-cart"></span>
                                                            <span class="count countcarts">{{$carts->count()}}</span>
                                                        </a>
                                                    </div>
                                                    <div class="widget kobolg widget_shopping_cart">
                                                        <div class="widget_shopping_cart_content">
                                                            <h3 class="minicart-title">Your Cart<span
                                                                    class="countcarts minicart-number-items">{{$carts->count()}}</span>
                                                            </h3>
                                                            <ul class="kobolg-mini-cart cart_list product_list_widget item-cart"
                                                                id="">
                                                                @foreach ($carts as $cart)

                                                                <li class="kobolg-mini-cart-item mini_cart_item">
                                                                    <a href="javascript:void(0)" data-id="{{$cart->id}}"
                                                                        class="delete remove_from_cart_button">×</a>
                                                                    <a href="#">
                                                                        <img src="/assets/images/apro134-1-600x778.jpg"
                                                                            class="attachment-kobolg_thumbnail size-kobolg_thumbnail"
                                                                            alt="img" width="600"
                                                                            height="778">{{$cart->name}}&nbsp;
                                                                    </a>
                                                                    <span class="quantity">{{$cart->quantity}} × <span
                                                                            class="kobolg-Price-amount amount"><span
                                                                                class="kobolg-Price-currencySymbol">{{"Rp " . number_format($cart->price,2,',','.')}}</span>
                                                                </li>

                                                                @endforeach
                                                            </ul>
                                                            <p class="kobolg-mini-cart__total">
                                                                <strong>Subtotal:</strong>
                                                                <span class="kobolg-Price-amount amount sub-total">
                                                                    <span
                                                                        class="kobolg-Price-currencySymbol-totals">{{"Rp " . number_format($total->total,2,',','.')}}</span>
                                                                </span>
                                                            </p>
                                                            <p class="kobolg-mini-cart__buttons buttons">
                                                                <a href="cart.html"
                                                                    class="button kobolg-forward">Viewcart</a>
                                                                <a href="checkout.html"
                                                                    class="button checkout kobolg-forward">Checkout</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-mobile">
        <div class="header-mobile-left">
            <div class="block-menu-bar">
                <a class="menu-bar menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="header-search kobolg-dropdown">
                <div class="header-search-inner" data-kobolg="kobolg-dropdown">
                    <a href="#" class="link-dropdown block-link">
                        <span class="flaticon-search"></span>
                    </a>
                </div>
                <div class="block-search">
                    <form role="search" method="get" class="form-search block-search-form kobolg-live-search-form">
                        <div class="form-content search-box results-search">
                            <div class="inner">
                                <input autocomplete="off" class="searchfield txt-livesearch input" name="s" value=""
                                    placeholder="Search here..." type="text">
                            </div>
                        </div>
                        <input name="post_type" value="product" type="hidden">
                        <input name="taxonomy" value="product_cat" type="hidden">
                        <div class="category">
                            <select title="product_cat" name="product_cat" id="1770352541"
                                class="category-search-option" tabindex="-1" style="display: none;">
                                <option value="0">All Categories</option>
                                <option class="level-0" value="light">Camera</option>
                                <option class="level-0" value="chair">Accessories</option>
                                <option class="level-0" value="table">Game & Consoles</option>
                                <option class="level-0" value="bed">Life style</option>
                                <option class="level-0" value="new-arrivals">New arrivals</option>
                                <option class="level-0" value="lamp">Summer Sale</option>
                                <option class="level-0" value="specials">Specials</option>
                                <option class="level-0" value="sofas">Featured</option>
                            </select>
                        </div>
                        <button type="submit" class="btn-submit">
                            <span class="flaticon-search"></span>
                        </button>
                    </form><!-- block search -->
                </div>
            </div>
            <ul class="wpml-menu">
                <li class="menu-item kobolg-dropdown block-language">
                    <a href="#" data-kobolg="kobolg-dropdown">
                        <img src="/assets/images/en.png" alt="en" width="18" height="12">
                        English
                    </a>
                    <span class="toggle-submenu"></span>
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="#">
                                <img src="/assets/images/it.png" alt="it" width="18" height="12">
                                Italiano
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <div class="wcml-dropdown product wcml_currency_switcher">
                        <ul>
                            <li class="wcml-cs-active-currency">
                                <a class="wcml-cs-item-toggle">USD</a>
                                <ul class="wcml-cs-submenu">
                                    <li>
                                        <a>EUR</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div class="header-mobile-mid">
            <div class="header-logo">
                <a href="index.html"><img alt="Kobolg" src="/assets/images/logo.png" class="logo"></a></div>
        </div>
        <div class="header-mobile-right">
            <div class="header-control-inner">
                <div class="meta-dreaming">
                    <div class="menu-item block-user block-dreaming kobolg-dropdown">
                        <a class="block-link" href="my-account.html">
                            <span class="flaticon-profile"></span>
                        </a>
                        <ul class="sub-menu">
                            <li
                                class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--dashboard is-active">
                                <a href="#">Dashboard</a>
                            </li>
                            <li
                                class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--orders">
                                <a href="#">Orders</a>
                            </li>
                            <li
                                class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--downloads">
                                <a href="#">Downloads</a>
                            </li>
                            <li
                                class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-addresses">
                                <a href="#">Addresses</a>
                            </li>
                            <li
                                class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--edit-account">
                                <a href="#">Account details</a>
                            </li>
                            <li
                                class="menu-item kobolg-MyAccount-navigation-link kobolg-MyAccount-navigation-link--customer-logout">
                                <a href="#">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div class="block-minicart block-dreaming kobolg-mini-cart kobolg-dropdown">
                        <div class="shopcart-dropdown block-cart-link" data-kobolg="kobolg-dropdown">
                            <a class="block-link link-dropdown" href="cart.html">
                                <span class="flaticon-online-shopping-cart"></span>
                                <span class="count countcarts">{{$carts->count()}}</span>
                            </a>
                        </div>
                        <div class="widget kobolg widget_shopping_cart">
                            <div class="widget_shopping_cart_content">
                                <h3 class="minicart-title">Your Cart<span
                                        class="countcarts minicart-number-items">{{$carts->count()}}</span>
                                </h3>
                                <ul class="kobolg-mini-cart cart_list product_list_widget item-cart" id="">
                                    @foreach ($carts as $cart)

                                    <li class="kobolg-mini-cart-item mini_cart_item">
                                        <a href="javascript:void(0)" data-id="{{$cart->id}}"
                                            class="delete remove_from_cart_button">×</a>
                                        <a href="#">
                                            <img src="/assets/images/apro134-1-600x778.jpg"
                                                class="attachment-kobolg_thumbnail size-kobolg_thumbnail" alt="img"
                                                width="600" height="778">{{$cart->name}}&nbsp;
                                        </a>
                                        <span class="quantity">{{$cart->quantity}} × <span
                                                class="kobolg-Price-amount amount"><span
                                                    class="kobolg-Price-currencySymbol">{{"Rp " . number_format($cart->price,2,',','.')}}</span>
                                    </li>

                                    @endforeach
                                </ul>
                                <p class="kobolg-mini-cart__total"><strong>Subtotal:</strong>
                                    <span class="kobolg-Price-amount amount sub-total">
                                        <span
                                            class="kobolg-Price-currencySymbol-totals">{{"Rp " . number_format($total->total,2,',','.')}}</span>
                                    </span>
                                </p>
                                <p class="kobolg-mini-cart__buttons buttons">
                                    <a href="cart.html" class="button kobolg-forward">Viewcart</a>
                                    <a href="checkout.html" class="button checkout kobolg-forward">Checkout</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>