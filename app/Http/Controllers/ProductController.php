<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Carts;
use App\Models\ProductCategories;
use App\Models\ProductCategoryDetails;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Products::where('stock','>','0')->paginate(8);
        $categories = ProductCategories::all();
        $carts = Carts::join('products','carts.product_id','=','products.id')
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->select(
            \DB::raw('products.price * carts.qty as subprice'),
            'products.product_name as name',
            'carts.qty as quantity',
            'carts.id',
            'products.id as product_id',
            'products.price',)
         ->get();

         $total = Carts::join('products','carts.product_id','=','products.id')
         ->select(\DB::raw('SUM(products.price * carts.qty) as total'))
          ->where('user_id',"=",'1')
          ->where('status','=','notyet')
          ->get()->first();
          $data = '';
          if ($request->ajax()) {
            foreach ($products as $product) {
                $data.='<div
                class="product-item col-lg-3 col-6 col-md-4 featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped">
                <div class="product-inner tooltip-top">
                    <div class="product-thumb">
                        <a class="thumb-link" href="#" tabindex="0">
                            <img class="img-responsive" src="assets/images/apro61-1-270x350.jpg"
                                alt="'.$product->product_name.'" width="270" height="350">
                        </a>
                        <div class="flash">
                            <span class="onnew"><span class="text">New</span></span></div>
                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                    </div>
                    <div class="product-info">
                        <div class="rating-wapper nostar">
                            <div class="star-rating"><span style="width:0%">Rated <strong
                                        class="rating">0</strong> out of 5</span></div>
                            <span class="review">(0)</span>
                        </div>
                        <h3 class="product-name product_title">
                            <a href="#" tabindex="0">'.$product->product_name.'</a>
                        </h3>
                        <span class="price"><span class="kobolg-Price-amount amount"><span
                                    class="kobolg-Price-currencySymbol">'."Rp " . number_format($product->price,2,',','.').'</span>
                    </div>
                    <div class="group-button clearfix">
    
                        <div class="add-to-cart">
                            <a href="javascript:void(0)" data-id="'.$product->id.'"
                                data-stock="'.$product->stock.'" class="btn-add button product_type_grouped">
                                add to cart products</a></div>
    
                    </div>
                </div>
            </div>';
            }
            return $data;
        }
        
        //  dd($carts);
        return view('index',compact('products','categories','carts','total'));
    }


    public function categoryFilter(Request $request)
    {
        if ($request->id == null) {
            $products = Products::where('stock','>','0')->get();
        }else{
        $products=ProductCategoryDetails::join('products','product_category_details.product_id','=','products.id')
        ->where('category_id','=',$request->id)->where('stock','>','0')->get();
        }
        $data ='';
        if ($request->ajax()) {
            foreach ($products as $product) {
                $data.='<div
                class="product-item col-md-3 featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped">
                <div class="product-inner tooltip-top">
                    <div class="product-thumb">
                        <a class="thumb-link" href="javascript:void(0)" tabindex="0">
                            <img class="img-responsive" src="assets/images/apro61-1-270x350.jpg"
                                alt="'.$product->product_name.'" width="270" height="350">
                        </a>
                        <div class="flash">
                            <span class="onnew"><span class="text">New</span></span></div>
                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                    </div>
                    <div class="product-info">
                        <div class="rating-wapper nostar">
                            <div class="star-rating"><span style="width:0%">Rated <strong
                                        class="rating">0</strong> out of 5</span></div>
                            <span class="review">(0)</span>
                        </div>
                        <h3 class="product-name product_title">
                            <a href="#" tabindex="0">'.$product->product_name.'</a>
                        </h3>
                        <span class="price"><span class="kobolg-Price-amount amount"><span
                                    class="kobolg-Price-currencySymbol">'."Rp " . number_format($product->price,2,',','.').'</span>
                    </div>
                    <div class="group-button clearfix">
    
                        <div class="add-to-cart">
                            <a href="javascript:void(0)" data-id="'.$product->id.'"
                                data-stock="'.$product->stock.'" class="btn-add button product_type_grouped">
                                add to cart products</a></div>
    
                    </div>
                </div>
            </div>';
            }
            return $data;
        }

    }
    public function searchFilter(Request $request)
    {
        if ($request->value == null) {
            $products = Products::where('stock','>','0')->get();
        }else{
            $products=ProductCategoryDetails::join('products','product_category_details.product_id','=','products.id')
            ->where('products.product_name','LIKE','%'.$request->value.'%')->where('stock','>','0')->get();
        }
        $data ='';
        if ($request->ajax()) {
            foreach ($products as $product) {
                $data.='<div
                class="product-item col-md-3 featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped">
                <div class="product-inner tooltip-top">
                    <div class="product-thumb">
                        <a class="thumb-link" href="javascript:void(0)" tabindex="0">
                            <img class="img-responsive" src="assets/images/apro61-1-270x350.jpg"
                                alt="'.$product->product_name.'" width="270" height="350">
                        </a>
                        <div class="flash">
                            <span class="onnew"><span class="text">New</span></span></div>
                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                    </div>
                    <div class="product-info">
                        <div class="rating-wapper nostar">
                            <div class="star-rating"><span style="width:0%">Rated <strong
                                        class="rating">0</strong> out of 5</span></div>
                            <span class="review">(0)</span>
                        </div>
                        <h3 class="product-name product_title">
                            <a href="#" tabindex="0">'.$product->product_name.'</a>
                        </h3>
                        <span class="price"><span class="kobolg-Price-amount amount"><span
                                    class="kobolg-Price-currencySymbol">'."Rp " . number_format($product->price,2,',','.').'</span>
                    </div>
                    <div class="group-button clearfix">
    
                        <div class="add-to-cart">
                            <a href="javascript:void(0)" data-id="'.$product->id.'"
                                data-stock="'.$product->stock.'" class="btn-add button product_type_grouped">
                                add to cart products</a></div>
    
                    </div>
                </div>
            </div>';
            }
            return $data;
        }

    }

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function stock()
    {
        $data = Products::select('stock')->get();
        $sen = $data->toArray();
        return response()->json([
        'status' => true,
        'stocks' => $sen
    ], 200);
       
    }
    public function store(Request $request)
    {
     
        $carts = new Carts;
        if ($request->stock < 1) {
           echo 'stock habis';
        }else{
        $stock = $request->stock-1;
        Products::where('id',"=",$request->id)->update([
                'stock' => $stock,
            ]);
       
    
    $carts->product_id = $request->id;
    $carts->user_id  = 1;
    $carts->qty = 1;
    $carts->status = 'notyet';
    $carts->save();
    return redirect('checkout');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        return view('detail-product',compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}