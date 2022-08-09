<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\ProductAttribute;
use View;
use App\Models\Billing;
use DB;
use App\Models\User;
use Session;
use Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use GuzzleHttp\Handler\Proxy;
use App\Models\Comment;
use App\Models\WishList;
use App\Models\Cart;

class ProductsController extends Controller
{
    public function allProducts()
    {
        $categories = Category::with('subcategories')->where(['parent_id' =>0])->get();
        $products = Product::where('status',1);
        $sleeveArray = Product::select('sleeve')->groupBy('sleeve')->get();
        $colorArray = Product::select('product_color')->groupBy('product_color')->get();
        $patternArray = Product::select('pattern')->groupBy('pattern')->get();
        $fabricArray = Product::select('fabric')->groupBy('fabric')->get();
        $brands = Brand::get();
        $products = $products->paginate(9);
        $url ="all";
        $title = "Products";
        $meta_title = "Products - E-com  Website";
        $meta_keywords="View products of E-com Website";
        $meta_description ="products, e-com webiste";
        return view('front.product.all_listing', compact('products', 'title', 'categories', 'fabricArray','colorArray','sleeveArray','patternArray','brands', 'url'
        , 'meta_title','meta_keywords', 'meta_description'));
    }
    public function searchProducts(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            $searchProduct = $data['product'];
            if(empty($searchProduct)){
                redirect()->back()->with('error_message', 'You must enter some product name');
            }
            // $products = Product::where('product_name', 'like', '%'.$searchProduct.'%')->orwhere('product_code', $searchProduct)->paginate(9);
            if($data['category_id']==="All"){
                $products = Product::where(function($query) use($searchProduct){
                    $query->where('product_name', 'like', '%'.$searchProduct.'%')->orwhere('product_code', 'like', '%'.$searchProduct.'%')->orwhere('product_color', 'like', '%'.$searchProduct.'%');
                })->where('status',1)->get();
                
            }else{
                $url = Category::where('url',$data['category_id'])->first();
                $subCategories = Category::where(['parent_id'=>$url->id, 'status'=>1])->get();
                $cat_id =array();
                foreach($subCategories as $subcat){
                    // $cat_id[] = $subcat->id;
                    array_push($cat_id, $subcat->id);
                }
                // dd($cat_id);
                $products = Product::whereIn('category_id', $cat_id)->where(function($query) use($searchProduct){
                    $query->where('product_name', 'like', '%'.$searchProduct.'%')->orwhere('description', 'like', '%'.$searchProduct.'%')->orwhere('product_color', 'like', '%'.$searchProduct.'%');
                })->where('status',1)->get();
                // dd($products);
            }
            $categories = Category::with('subcategories')->where(['parent_id' =>0])->get();
            $sleeveArray = Product::select('sleeve')->groupBy('sleeve')->get();
            $colorArray = Product::select('product_color')->groupBy('product_color')->get();
            $patternArray = Product::select('pattern')->groupBy('pattern')->get();
            $fabricArray = Product::select('fabric')->groupBy('fabric')->get();
            $brands = Brand::get();
            $title = $searchProduct;
            $url = "all";
            return view('front.product.all_listing', compact('products', 'searchProduct','title', 'url', 'categories','fabricArray','colorArray','sleeveArray','patternArray','brands'));
        }
    }

    public function products($url=null)
    {
        if(request()->ajax())
        {
            $data = request()->all();
            $sort = $data['sort'];
            $url = $data['url'];
            //  return($url);
            if($url != 'all'){
                // return $url;
                $countCategory = Category::where(['url'=>$url, 'status'=>1])->count();
                if($countCategory===0){
                    return view('front.error.error');
                }
                 $categoryAll = Category::where(['url'=>$url])->first();
                if($categoryAll->parent_id===0) {
                    $subCategories = Category::where(['parent_id'=>$categoryAll->id, 'status'=>1])->get();
                    $cat_ids=array();
                    foreach($subCategories as $subcat){
                        array_push($cat_ids, $subcat->id);
                    }
                    $products = Product::whereIn('category_id', $cat_ids)->orderBy('product_price', 'DESC')->where(['status'=>1]);
    
                } else {    
                    $products = Product::where(['category_id'=>$categoryAll->id, 'status'=>1]);
                    // dd($products);
                }
            }else{
                $products = Product::where('status',1);
            }
            if(isset($data['sort'])&& !empty($data['sort'])){
                if($data['sort'] =="product_lastest"){
                    $products->orderBy('id', 'Desc');
                }
                if($data['sort'] =="product_name_a_z"){
                    $products->orderBy('product_name', 'Asc');
                }
                if($data['sort'] =="product_name_z_a"){
                    $products->orderBy('product_name', 'Desc');
                }
                if($data['sort'] =="product_name_price_high_low"){
                    $products->orderBy('product_price', 'Desc');
                    // dd($products);
                }
                if($data['sort'] == "product_name_price_low_high"){
                    $products->orderBy('product_price', 'Asc');
                    // dd($products);
                }
            }
            if(!empty($data['minPrice']) && !empty($data['maxPrice'])){
                $products = $products->whereBetween('products.product_price',[$data['minPrice'], $data['maxPrice']]);
            }
            if(!empty($data['sleeve']) && !empty($data['sleeve'])) {
                $products = $products->whereIn('products.sleeve', $data['sleeve']);
                    // dd($products);
            }
            if(!empty($data['fabric']) && !empty($data['fabric'])) {
                $products = $products->whereIn('products.fabric', $data['fabric']);
                    // dd($products);
            }
            if(!empty($data['pattern']) && !empty($data['pattern'])) {
                $products = $products->whereIn('products.pattern', $data['pattern']);
                    // dd($products);
            }
            if(!empty($data['brand']) && !empty($data['brand'])) {
                $products = $products->whereIn('products.brand_id', $data['brand']);
                    // dd($products);
            }
            $products = $products->paginate(9);
            return view('front.product.ajax_products', compact('products'));
        }else{
            $countCategory = Category::where(['url'=>$url, 'status'=>1])->count();
            if($countCategory===0){
                return view('front.error.error');
            }
            $categories = Category::with(['subcategories'])->where(['parent_id'=>0, 'status'=>1])->get();
            // dd($categories);
            $categoryAll = Category::where(['url'=>$url])->first();
            $title = $categoryAll->category_name;

            // return $categoryAll;
            if($categoryAll->parent_id===0) {
                $subCategories = Category::where(['parent_id'=>$categoryAll->id, 'status'=>1])->get();
                $cat_ids=array();
                foreach($subCategories as $subcat){
                    array_push($cat_ids, $subcat->id);
                }
                $cat_ids[] = $categoryAll->id;
                // return $cat_ids;
                $products = Product::whereIn('category_id', $cat_ids)->orderBy('product_price', 'DESC')->where(['status'=>1]);
                $countCategoryDetalis = Category::where(['url'=>$url])->first();
                $meta_title = $countCategoryDetalis->meta_title;
                $meta_keywords = $countCategoryDetalis->meta_keywords;
                $meta_description = $countCategoryDetalis->meta_description;
            } else {
                $products = Product::where(['category_id'=>$categoryAll->id, 'status'=>1]);
                $countCategoryDetalis = Category::with('parentcategory')->where(['url'=>$url])->first();
                $mainCategory = Category::where('id',$countCategoryDetalis->parent_id)->first();
                $meta_title = $countCategoryDetalis->meta_title;
                $meta_keywords = $countCategoryDetalis->meta_keywords;
                $meta_description = $countCategoryDetalis->meta_description;
            }
            $sleeveArray = Product::select('sleeve')->groupBy('sleeve')->get();
            $colorArray = Product::select('product_color')->groupBy('product_color')->get();
            $patternArray = Product::select('pattern')->groupBy('pattern')->get();
            $fabricArray = Product::select('fabric')->groupBy('fabric')->get();
            $brands = Brand::get();
            $products = $products->paginate(9);
            $categories = Category::with('subcategories')->where(['parent_id' =>0])->get();
            // return $meta_title;
            return view('front.product.listing', compact('products', 'title', 'categories','countCategoryDetalis', 'fabricArray','colorArray','sleeveArray','patternArray','brands', 'url'
            ,'meta_title','meta_description','meta_keywords'));
        }
    }

    
    public function product($url=null)
    {
        $countProduct = Product::where(['url'=>$url, 'status'=>1])->count();
        if($countProduct===0){
            return view('front.error.error');
        }
        $categories = Category::with(['subcategories'])->where(['parent_id'=>0, 'status'=>1])->get();
        $productDetails = Product::with(['attributes'])->where(['url'=>$url, 'status'=>1])->first();
        $relatedProducts = Product::where('url','!=', $url)->where(['category_id'=>$productDetails->category_id, 'status'=>1])->get();
        // $productImages = ProductsImage::where(['product_id'=>$id, 'status'=>1])->get();
        $total_stock = ProductAttribute::where('product_id',$productDetails->id)->sum('stock');

        $categoryAll = Category::where(['id'=>$productDetails->category_id])->first();
        
        $countProductDetails = Product::where(['url'=>$url])->first();
        // $ratings = Rating::with('user')->where(['product_id'=>$id, 'status'=>1])->get();

        // $rating_sum = Rating::where(['product_id'=>$id, 'status'=>1])->sum('rating');
        // $rating_count = Rating::where(['product_id'=>$id, 'status'=>1])->count();
        // if ($rating_count >0) {
        //     $avag_rating = round($rating_sum/$rating_count, 2);
        //     $avag_star_rating = round($rating_sum/$rating_count);        
        // } else{
        //     $avag_rating = 0;
        //     $avag_star_rating = 0; 
        // }
        $comments = Comment::orderBy('id','desc')->where('product_id', $productDetails->id)->get();
        $rating_sum = Comment::where(['product_id'=>$productDetails->id])->sum('ratings');
        $rating_count = Comment::where(['product_id'=>$productDetails->id])->count();
        if ($rating_count >0) {
            $avag_rating = round($rating_sum/$rating_count, 2);
            $avag_star_rating = round($rating_sum/$rating_count);        
        } else{
            $avag_rating = 0;
            $avag_star_rating = 0; 
        }
        $comments = Comment::orderBy('id', 'desc')->where("product_id",$productDetails->id)->get();
        $meta_title = $countProductDetails->meta_title;
        $meta_keywords = $countProductDetails->meta_keywords;
        $meta_description = $countProductDetails->meta_description;
        return view('front.product.details', compact('productDetails','avag_star_rating', 'avag_rating', 'comments',  'categories', 'total_stock','relatedProducts','meta_title','meta_description','meta_keywords',
        // 'breadcrumb', 'ratings', 'avag_star_rating', 'avag_rating'
        ));

    }

    public function productItemPrice()
    {
        $attributes = ProductAttribute::where('id',request('sizeId'))->first();
        return response()->json( $attributes ,200);
    }

    public function addCart()
    {
        $data = request()->all();
        if(empty($data['wish_list_id'])){
            if($data['size']===null) {
                return redirect()->back()->with('error_message', 'Please! Select the size of product!');
            }
        }

        if(!auth()->check())
        {
            if(!empty($data['cart']) && $data['cart']==="cart"){
                $type = $data['cart'];
            }
            if(!empty($data['wish_list']) && $data['wish_list']==="wish_list"){
                $type = $data['wish_list'];
            }
            $sizeArr = explode("-",$data['size']);
            $product_code = ProductAttribute::select('sku')->where('id', $sizeArr[0])->first();
            $product_code = $product_code->sku;
            $product_size = $sizeArr[1];
            setcookie("product_id", $data['product_id'], time() + 2 * 24 * 60 * 60);
            setcookie("product_name", $data['product_name'], time() + 2 * 24 * 60 * 60);
            setcookie("product_image", $data['product_image'], time() + 2 * 24 * 60 * 60);
            setcookie("product_price", $data['product_price'], time() + 2 * 24 * 60 * 60);
            setcookie("product_size", $product_size, time() + 2 * 24 * 60 * 60);
            setcookie("product_code", $product_code, time() + 2 * 24 * 60 * 60);
            setcookie("color", $data['color'], time() + 2 * 24 * 60 * 60);
            setcookie("quantity", $data['quant'], time() + 2 * 24 * 60 * 60);
            setcookie("type", $type, time() + 2 * 24 * 60 * 60);
            return redirect()->route('login');
        }

        if(!empty($data['cart']) && $data['cart']==="cart")  {

        
            if(empty($data['wish_list_id'])){
                $sizeArr = explode("-",$data['size']);
                $product_size = $sizeArr[1];
                $product_code = ProductAttribute::select('sku')->where('id', $sizeArr[0])->first();
                $product_code = $product_code->sku;
            }else{
                $product_code = $data['product_code'];
                $product_size = $data['product_size'];
            }
            $count = Cart::where(['product_id'=>$data['product_id'], 'user_id'=>auth()->user()->id, 'product_code'=>$data['product_code']])->count();
            if($count > 0){
                return redirect()->back()->with('error_message', 'Item already exists');
            }
            $cart = new Cart();
            $cart->product_id = $data['product_id'];
            $cart->user_id = auth()->user()->id;
            $cart->product_name = $data['product_name'];
            $cart->product_image = $data['product_image'];
            $cart->price = $data['product_price'];
            $cart->size = $product_size;
            $cart->product_code = $product_code;
            $cart->product_color = $data['color'];
            $cart->quantity = $data['quant'];
            $cart->save();

            if(!empty($data['wish_list_id'])){
                WishList::where('id', $data['wish_list_id'])->delete();
            }
            return redirect()->back()->with('success_message', 'Product has been added to cart successfully!');
        }else if(!empty($data['wish_list']) && $data['wish_list']==="wish_list"){
            $count = WishList::where('product_id',$data['product_id'])->count();
            $sizeArr = explode("-",$data['size']);
            $product_size = $sizeArr[1];
            $product_code = ProductAttribute::select('sku')->where('id', $sizeArr[0])->first();
            if($count > 0){
                return redirect()->back()->with('error_message', 'Item already exists');
            }
            $cart = new WishList();
            $cart->product_id = $data['product_id'];
            $cart->user_id = auth()->user()->id;
            $cart->product_name = $data['product_name'];
            $cart->product_image = $data['product_image'];
            $cart->price = $data['product_price'];
            $cart->size = $product_size;
            $cart->product_code = $product_code->sku;
            $cart->product_color = $data['color'];
            $cart->quantity = $data['quant'];
            $cart->save();
            return redirect()->back()->with('success_message', 'Product has been added to wish list successfully!');
        }
        
    }

    public function wishList()
    {
        $wish_list = WishList::where('user_id', auth()->user()->id)->get();
        $meta_title = "wish list - E-shop Website";
        $meta_keywords="View wihs list - E-shop Websiet";
        $meta_description ="wish list- E-shop Websiet";
        return view('front.product.wish_list', compact('wish_list', 'meta_title','meta_description','meta_keywords'));
    }

    public function cart()
    {
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        $meta_title = "Shopping Cart - E-com  Website";
        $meta_keywords="View Shopping cart of E-com Website";
        $meta_description ="shopping cart, e-com webiste";
        return view('front.product.cart', compact('carts', 'meta_title','meta_description','meta_keywords'));
    }

    public function ajaxUpdateCartQuantity()
    {
        Cart::where(['id'=>request('cart_id'), 'user_id'=>auth()->user()->id])->update(['quantity'=>request('value')]);
        $carts = Cart::where('user_id', auth()->user()->id)->get();
        return view('front.product.ajax_cart', compact('carts'));
        // return response()->json(['view'=>(String)View::make('front.product.ajax_cart')->with(compact('carts'))]);
    }
    public function deleteCart($id=null)
    {
        $count = Cart::where(['id'=> $id, 'user_id'=>auth()->user()->id])->count();
        if($count > 0){
            Cart::where(['id'=> $id, 'user_id'=>auth()->user()->id])->delete();  
            return redirect()->back()->with('success_message', 'Product has been deleted from cart successfully');      
        }else{
            return redirect()->back()->with('error_message', 'Record not found');
        }
    }
    public function deleteWishList($id=null)
    {
        $count = WishList::where(['id'=> $id, 'user_id'=>auth()->user()->id])->count();
        if($count > 0){
            WishList::where(['id'=> $id, 'user_id'=>auth()->user()->id])->delete();  
            return redirect()->back()->with('success_message', 'Product has been deleted from wish list successfully');      
        }else{
            return redirect()->back()->with('error_message', 'Record not found');
        }
    }

    public function checkout()
    {
        if(request()->isMethod('POST')){
            $user_id = Auth::user()->id;
            $user = User::find($user_id);
            // check if shipping address already exists

            $shippingCount = Billing::where('user_id',$user_id)->count();
            $shippingDetails = array();
            if($shippingCount>0) {
                $shippingDetails = Billing::where('user_id',$user_id)->first();
            }
            if(request()->isMethod('post')) {
                $data = request()->all();
                if(empty($data['shipping_name']) || empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_country']) || empty($data['shipping_number'])) {
                    Session::flash('error_message', 'Please! fill all fields to checkout!');
                    return redirect()->back();
                }else{
                    // update user details
                    User::where('id', $user_id)->update([
                        'name'=> $data['name'],
                        'address' => $data['address'],
                        'city' => $data['city'],
                        'email' => $data['email'],
                        'number' => $data['number'],
                        'country' => $data['country'],
                    ]);
                    if($shippingCount>0) {
                        // update shipping address
                        Billing::where('user_id', $user_id)->update([
                            'name'=> $data['shipping_name'],
                            'email'=> $data['shipping_email'],
                            'address' => $data['shipping_address'],
                            'city' => $data['shipping_city'],
                            'country' => $data['shipping_country'],
                            'contact' =>$data['shipping_number'],
                        ]);
                    }else {
                        // add new shipping address
                        $shipping = new Billing;
                        $shipping->user_id = $user_id;
                        $shipping->email =$data['shipping_email'];
                        $shipping->name = $data['shipping_name'];
                        $shipping->address = $data['shipping_address'];
                        $shipping->city = $data['shipping_city'];
                        $shipping->country = $data['shipping_country'];
                        $shipping->contact = $data['shipping_number'];
                        $shipping->save();
                    }
                    // return redirect()->action('ProductsController@orderReview');
                    // to_route('order.review');
                    return redirect()->route('order.review');

                }
            }
        }

        // return 'erw';
        $countries = DB::table('country')->get();
        $shipping_address = Billing::where('user_id', auth()->user()->id)->first();
        $meta_title = "Checkout - E-com  Website";
        $meta_keywords="View checkout cart of E-com Website";
        $meta_description ="checkout, e-com webiste";
        return view('front.product.checkout', compact('shipping_address', 'countries','meta_title','meta_description','meta_keywords'));
    }

    public function orderReview()
    {
        $user_id = Auth::user()->id;
        $shippingDetails = Billing::where('user_id',$user_id)->first();
        $userCart = Cart::where('user_id',$user_id)->get();
        // meta tags
        $meta_title = "Order - E-com  Website";
        $meta_keywords="View Order,  E-com Website";
        $meta_description ="view order, e-com webiste";
        return view('front.product.order_review', compact('shippingDetails', 'userCart', 'meta_title','meta_description','meta_keywords'));
    }

    public function placeOrder(Request $reqest)
    {
        if($reqest->isMethod('post')) {
            $data = $reqest->all();
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;

            // check payment method is null or not
            if(empty($data['payment_method'])){
                return redirect()->back()->with('error_message','Please! select payment method.');
            }
            // count cart
            $count = DB::table('carts')->where('user_id', $user_id)->count();
            if($count < 1){ 
                return redirect()->back()->with('error_message','Item is not exists in cart');
            }
            // prevent out of stock products form ordering
            $userCart = DB::table('carts')->where('user_id', $user_id)->get();
            foreach($userCart as $cart) {
                // return $cart;

                // get attribute of product is availabel or not
                $getAttributeCount = Product::getAttributeCount($cart->product_id,$cart->size);
                if($getAttributeCount===0) {
                    Product::deleteCartCount($cart->id, $user_email);
                    return redirect('/cart')->with('error_message','One of the product is not avaliable. Please try agin.');
                }

                // get the stock of status
                // echo $cart->product_id.$cart->size;die;
                $product_stock = Product::getProductStock($cart->product_id,$cart->size);
                if($product_stock->stock===0) {
                    Product::deleteCartCount($cart->id, $user_email);
                    return redirect('/cart')->with('error_message','Sold out product removed from cart. Please try placing order again.');
                }

                // check the stock quantity  an order quantity
                if($product_stock->stock<$cart->quantity) {
                    return redirect('/cart')->with('error_message','Reduce Product stock and try again.');
                }

                // get the product of status
                $product_status = Product::getProductStatus($cart->product_id);
                if($product_status===0) {
                    Product::deleteCartCount($cart->id, $user_email);
                    return redirect('/cart')->with('error_message','Disable product removed from cat. Please try placin order agin.');
                }

                // check category is disable or not
                $getCatgoryId = Product::select('category_id')->where('id',$cart->product_id)->first();
                $getCagtegoryStatus = Product::getCategoryStatus($getCatgoryId->category_id);
                if($getCagtegoryStatus === 0) {
                    Product::deleteCartCount($cart->id, $user_email);
                    return redirect('/cart')->with('error_message','Disable Product Category removed from cat. Please try placin order agin.');
                }
            }
            // get shipping address of user
            $shippingDetails = Billing::where(['user_id' => $user_id])->first();
            // dd($shippingDetails);
            // $shippingDetails = json_decode(json_encode($shippingDetails));

            if(empty(Session::get('CouponCode'))) {
                $couponCode = "";
            }else {
                $couponCode = Session::get('CouponCode');
            }

            if(empty(Session::get('CouponAmount'))) {
                $couponAmount = "";
            }else {
                $couponAmount = Session::get('CouponAmount');
            }
            $order = new Order;
            $order->user_id = $user_id;
            $order->email = $shippingDetails->email;
            $order->name = $shippingDetails->name;
            $order->address = $shippingDetails->address;
            $order->city = $shippingDetails->city;
            $order->country = $shippingDetails->country;
            $order->contact = $shippingDetails->contact ;
            $order->shipping_charge = $data['delivery_charge'];
            $order->tax = $data['tax'];
            $order->coupon_code = $couponCode;
            $order->coupon_amount = $couponAmount;
            $order->status = "New";
            $order->payment_method = $data['payment_method'];
            $order->grand_total = $data['grand_total'] ;
            $order->save();

            $order_id = DB::getPdo()->lastInsertId();

            $cartProduct = DB::table('carts')->where(['user_id'=> $user_id])->get();
            foreach($cartProduct as $pro) {
                $cartPro = new OrderDetail;
                $cartPro->order_id = $order_id;
                $cartPro->product_id = $pro->product_id;
                $cartPro->product_code = $pro->product_code;
                $cartPro->product_name = $pro->product_name;
                $cartPro->product_color = $pro->product_color;
                $cartPro->product_size = $pro->size;
                $price = Product::getProductPrice($pro->product_id, $pro->size);
                $cartPro->product_price = $price;
                $cartPro->product_qty = $pro->quantity;
                $cartPro->save();

                // Reduce stock scripts stats
                $getProductStock = ProductAttribute::where('sku', $pro->product_code)->first();
                $quantity = $getProductStock->stock-$pro->quantity;
                if($quantity<0) {
                    $quantity = 0;
                }
                ProductAttribute::where('sku', $pro->product_code)->update(['stock'=>$quantity]);
                Cart::where(['id'=>$pro->id, 'user_id'=>$user_id])->delete();

            }
            
            Session::put('order_id', $order_id);
            Session::put('grand_total', $data['grand_total']);
            return redirect()->route('account')->with('success_message', 'Order has been placed successfully.');

            // if($data['payment_method'] === ""){

            //     // get products details order by user
            //     $productDetails = Order::with('orders')->where('id', $order_id)->first();

            //     // get user details
            //     $userDetails = User::where('id', $user_id)->first();

            //     // code for order email
            //     $email = $user_email;
            //     // $messageData = [
            //     //     'email' => $email,
            //     //     'name' => $shippingDetails->name,
            //     //     'order_id' => $order_id,
            //     //     'userDetails' => $userDetails,
            //     //     'productDetails' => $productDetails,
            //     // ];
            //     // Mail::send('emails.order', $messageData, function ($message) use ($email){
            //     //     $message->to($email)->subject('Order Place - E-com Website');
            //     // });
            //     // $admin = Admin::first();
            //     // $data = collect(['productDetails'=>$productDetails, 'title'=>'order']);
            //     // // code for order email
            //     // $email = $admin->email;
            //     // $messageData = [
            //     //     'email' => $email,
            //     //     'admin_name' => $admin->name,
            //     //     'name' => $shippingDetails->name,
            //     //     'order_id' => $order_id,
            //     //     'userDetails' => $userDetails,
            //     //     'productDetails' => $productDetails,
            //     // ];
            //     // Mail::send('emails.admin_order', $messageData, function ($message) use ($email){
            //     //     $message->to($email)->subject('Order Place - E-com Website');
            //     // });
            //     // // dd($admin);
            //     // Notification::send($admin, new OrderNotification($data));

            //     // COD redirect user to thanks page after saving order
            //     return redirect()->action("ProductsController@thanks");
            // }else {
            //     // COD redirect user to khalti page after saving order
            //     return redirect()->action("ProductsController@khalti");
            // }
        }
    }
    public function addComment(Request $request)
    {
      
        $data = $request->all();
        $rules = [
            'message' => 'required',
        ];

        $customMessages = [
            'message.required' => 'Message is required',
        ];
        $this->validate(request(), $rules, $customMessages);
        $comments = new Comment;
        $comments->user_id = auth()->user()->id;
        $comments->product_id = $data['product_id'];
        $comments->name = auth()->user()->name;
        $comments->message = $data['message'];
        $comments->ratings = $data['rating'];
        $comments->save();
        return redirect()->back()->with('success_message','Comment created successfully'); // return auth()->user();
            
    }
}
