@extends('layouts.master')
@section('content')
<div class="fullwidth-template">
    <div class="slide-home-03">
        <div class="response-product product-list-owl owl-slick equal-container better-height"
            data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:0,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:1,&quot;rows&quot;:1}"
            data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:1,&quot;slidesMargin&quot;:&quot;0&quot;}}]">
            <div class="slide-wrap">
                <img src="assets/images/slide31.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h1>SUMMER</h1>
                            <h5>Hot Watches</h5>
                            <h2><span>Smart </span>Cool</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-wrap">
                <img src="assets/images/slide32.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h1>SPRING </h1>
                            <h5>New Arrivals</h5>
                            <h2><span>Modern</span> collection</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-wrap">
                <img src="assets/images/slide33.jpg" alt="image">
                <div class="slide-info">
                    <div class="container">
                        <div class="slide-inner">
                            <h1>AUTUMN </h1>
                            <h5>Best Seller</h5>
                            <h2><span>Photo </span> Screen</h2>
                            <a href="#">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section-001">
        <div class="container">
            <div class="kobolg-heading style-01">
                <div class="heading-inner">
                    <h3 class="title">Product</h3>
                    <div class="subtitle">Made with care for your little ones, our products are perfect for every
                        occasion. Check it out.
                    </div>
                </div>
            </div>
            <div class="filter pb-4 d-lg-flex d-block justify-content-between">
                <div data-items="8" class="vertical-wrapper block-nav-category has-vertical-menu show-button-all">
                    <div class="block-title">
                        <span class="before">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                        <span class="text-title">CATEGORIES</span>
                    </div>
                    <div class="block-content verticalmenu-content">
                        <ul id="menu-vertical-menu" class="azeroth-nav vertical-menu default">
                            <li id="menu-item-886" data-id=""
                                class="category-filter menu-item menu-item-type-custom menu-item-object-custom menu-item-886">
                                <a class="azeroth-menu-item-title" href="javascript:void(0)">All</a></li>
                            @foreach ($categories as $categori)
                            <li id="menu-item-886" data-id="{{$categori->id}}"
                                class="category-filter menu-item menu-item-type-custom menu-item-object-custom menu-item-886">
                                <a class="azeroth-menu-item-title" title="{{$categori->category_name}}"
                                    href="javascript:void(0)">{{$categori->category_name}}</a></li>
                            @endforeach

                        </ul>
                        <div class="view-all-category">
                            <a href="#" data-closetext="Close" data-alltext="All Categories"
                                class="btn-view-all open-cate">All Categories</a>
                        </div>
                    </div>
                </div><!-- block category -->
                <div class="header-search p-lg-0 pt-3 ml-lg-4 w-lg-0 w-100">
                    <div class="block-search">
                        <form role="search" method="get"
                            class="form-search d-flex block-search-form kobolg-live-search-form">
                            <div class="form-content search-box results-search mr-3 w-lg-0 w-100">
                                <div class="inner">
                                    <input autocomplete="off" id="form-search" class="searchfield txt-livesearch input"
                                        name="s" value="" placeholder="Search here..." type="text">
                                </div>
                            </div>
                            <button type="button" id="btn-search" class="btn-submit">
                                <span class="flaticon-search"></span>
                            </button>
                        </form><!-- block search -->
                    </div>
                </div>
            </div>
            <div class="kobolg-products style-02 CONTAINER">

                <div id="results" class="row" style="position: relative;">


                </div>

            </div>
        </div>
    </div>
    <div>


        @endsection
        @section('scripts')

        <script>
            $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      $('#btn-search').click();
    }
  });

var SITEURL = "{{ url('/') }}";
var nearToBottom = 100;
   var page = 1; //track user scroll as page number, right now page number is 1
   load_more(page); //initial content load
   $(window).scroll(function() { //detect page scroll
    console.log( $(window).scrollTop());

      if($(window).scrollTop() + $(window).height() >= 
    $('.CONTAINER').offset().top + $('.CONTAINER').height() ) { //if user scrolled from top to bottom of the page
      page++; //page number increment
      load_more(page); //load content   

  
      }
    });     
    function load_more(page){
        $.ajax({
           url: SITEURL + "?page=" + page,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
              $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){
            console.log(data.length);
            //notify user if nothing to load
            $('.ajax-loading').html("No more records!");
            return;
          }
          $('.ajax-loading').hide(); //hide loading animation once data is received
          $("#results").append(data); //append data into #results element          
           console.log('data.length');
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          alert('No response from server');
       });
    }
    function load_more_category(page){
        $.ajax({
           url: SITEURL + "filter-category?page=" + page,
           type: "get",
           datatype: "html",
           beforeSend: function()
           {
              $('.ajax-loading').show();
            }
        })
        .done(function(data)
        {
            if(data.length == 0){

            $('.ajax-loading').html("No more records!");
            return;
          }
          $('.ajax-loading').hide(); //hide loading animation once data is received
          $("#results").append(data); //append data into #results element          
         
       })
       .fail(function(jqXHR, ajaxOptions, thrownError)
       {
          alert('No response from server');
       });
    }


    $(document).on('click','.category-filter',function(){
		var id = $(this).data('id');
		$.ajax({
			url: '{{Route("filter-category")}}',
			type: 'get',
			data: {id: id},
			success: function(data){
                $('#results').html(data);
                $('.vertical-wrapper.block-nav-category.has-vertical-menu.show-button-all' ).removeClass('has-open');
                $('.block-title' ).removeClass('active');
			}
		});
	});
    $(document).on('click','#btn-search',function(){
		var val = $('#form-search').val();
		$.ajax({
			url: '{{Route("filter-search")}}',
			type: 'get',
			data: {value: val},
			success: function(data){
                $('#results').html(data);
			}
		});
	});
        </script>
        @endsection