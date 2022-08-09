<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Billing;
use DB;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Cart;
use App\Models\WishList;

class UserController extends Controller
{
    public function login()
    {
        if(request()->isMethod('post'))
        {
            $data = request()->all();
            // return Hash::make($data['password']);
            $rules = [
                'email' => 'required|email',
                'password' => 'required',
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valild Email is required',
                'password.required' => 'Password is required',
            ];
            $this->validate(request(), $rules, $customMessages);
            if(auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                if(!empty($_COOKIE['type']))
                {
                    if($_COOKIE['type'] == 'cart')
                    {
                        $count = Cart::where(['product_id'=>$_COOKIE['product_id'], 'user_id'=>auth()->user()->id, 'product_code'=>$_COOKIE['product_code']])->count();
                        if($count > 0){
                            return redirect()->route('cart')->with('success_message', 'Login successfully');
                        }
                        $cart = new Cart();
                        $cart->product_id = $_COOKIE['product_id'];
                        $cart->user_id = auth()->user()->id;
                        $cart->product_name = $_COOKIE['product_name'];
                        $cart->product_image = $_COOKIE['product_image'];
                        $cart->price = $_COOKIE['product_price'];
                        $cart->size = $_COOKIE['product_size'];
                        $cart->product_code = $_COOKIE['product_code'];
                        $cart->product_color = $_COOKIE['color'];
                        $cart->quantity = $_COOKIE['quantity'];
                        $cart->save();
                        if($cart->save()){
                            setcookie('product_id',''); 
                            setcookie('product_name',''); 
                            setcookie('product_image',''); 
                            setcookie('product_price',''); 
                            setcookie('product_size','');
                            setcookie('product_code',''); 
                            setcookie('color',''); 
                            setcookie('quantity','');  
                            setcookie('type',''); 
                        }
                        return redirect()->route('cart')->with('success_message', 'Login successfully');
                    }else if($_COOKIE['type'] == 'wish_list'){
                        $count = WishList::where(['product_id'=>$_COOKIE['product_id'], 'user_id'=>auth()->user()->id, 'product_code'=>$_COOKIE['product_code']])->count();
                        if($count > 0){
                            return redirect()->route('wish.list')->with('success_message', 'Login successfully');
                        }
                        $cart = new WishList();
                        $cart->product_id = $_COOKIE['product_id'];
                        $cart->user_id = auth()->user()->id;
                        $cart->product_name = $_COOKIE['product_name'];
                        $cart->product_image = $_COOKIE['product_image'];
                        $cart->price = $_COOKIE['product_price'];
                        $cart->size = $_COOKIE['product_size'];
                        $cart->product_code = $_COOKIE['product_code'];
                        $cart->product_color = $_COOKIE['color'];
                        $cart->quantity = $_COOKIE['quantity'];
                        $cart->save();
                        if($cart->save()){
                            setcookie('product_id',''); 
                            setcookie('product_name',''); 
                            setcookie('product_image',''); 
                            setcookie('product_price',''); 
                            setcookie('product_size','');
                            setcookie('product_code',''); 
                            setcookie('quantity',''); 
                            setcookie('color',''); 
                            setcookie('type',''); 
                        }
                        return redirect()->route('wish.list')->with('success_message', 'Login successfully');
                    }
                }
                return redirect()->route('home');
            }else{
                Session::flash('error_message', 'Invalid Email or Password');
                return redirect()->back();
            }

        }
        $meta_title = "Login - E-com  Website";
        $meta_keywords="View login cart of E-com Website";
        $meta_description ="login, e-com webiste";
        return view('front.login', compact('meta_title', 'meta_keywords', 'meta_description'));
    }

    public function register()
    {
        if(request()->isMethod('post'))
        {
            $data = request()->all();
            // return $data;
            $count = User::where('email', $data['email'])->count();
            if($count >=1){
                Session::flash('error_message', 'Email already exists');
                return redirect()->back();
            }
            $newUser = new User();
            $newUser->name = $data['username'];
            $newUser->email = $data['email'];
            $newUser->password = Hash::make($data['password']);
            $newUser->save();
            Session::flash('success_message', 'Your account has created sucessfully');
            return redirect()->back();
        }
        $meta_title = "Register - E-com  Website";
        $meta_keywords="View register cart of E-com Website";
        $meta_description ="register, e-com webiste";
        return view('front.register', compact('meta_title','meta_keywords', 'meta_description'));
    }

    public function account()
    {
        $oder = Order::orderBy('id', 'desc')->where('user_id',auth()->user()->id)->get();
        $countries = DB::table('country')->get();
        $shipping_address = Billing::where('user_id', auth()->user()->id)->first(); 
        $meta_title = "Account - E-com  Website";
        $meta_keywords="View account cart of E-com Website";
        $meta_description ="account, e-com webiste";
        return view('front.product.account', compact('shipping_address', 'countries', 'oder','meta_title','meta_description','meta_keywords'));
    }

    public function updateUserDetails(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        if($request->isMethod('post')) {

            $data = $request->all();
            $user = User::find($user_id);

            if(!empty($data['image'])){
                // dd($data['image']);
                $filename = time().'.'.request()->image->getClientOriginalExtension();
                request()->image->storeAs('public/images/user/', $filename);
                $user->image = 'storage/images/user/'.$filename;
            }
            $user->name = $data['name'];
            $user->address = $data['address'];
            $user->city = $data['city'];
            $user->number = $data['number'];
            $user->country = $data['country'];
            $user->save();
            return redirect()->back()->with('success_message', 'Your Profile has been updated successfully!');

        }

    }

    public function updateShippingBillingDetail(Request $request)
    {
        if(request()->isMethod('post')) {
            $user_id = auth()->user()->id;
            $data = request()->all();
            $shippingCount = Billing::where('user_id',$user_id)->count();

            if(empty($data['shipping_name']) || empty($data['shipping_address']) || empty($data['shipping_city']) || empty($data['shipping_country']) 
            || empty($data['shipping_number']) || empty($data['shipping_email'])
            || empty($data['name']) || empty($data['address']) || empty($data['city']) || empty($data['email']) || empty($data['number']) || empty($data['country'])) {
                Session::flash('error_message', 'Please! fill all fields to Update Details!');
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
                return redirect()->back()->with('success_message', 'User details updated successfully.');

            }
        }
    }
    public function updateCurrentPassword(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->all();
            // return $data->id;
            // check current password
            if(Hash::check($data['current_password'],Auth::user()->password)) {
                // check new password ana confirm password
                if($data['new_password']==$data['confirm_password']){
                    User::where('id',Auth::user()->id)->update(['password' => bcrypt($data['new_password'])]);
                    Session::flash('success_message', 'Password has been changed sucessfully');
                }else{
                    Session::flash('error_message', 'New Password and Confirm Password is not Match');
                }
            }else{
                Session::flash('error_message', 'Your Current Password is Incorrect');
            }
            return redirect()->back();
        }
    }

    public function orderDetail($id=null)
    {
        $orderDetails = OrderDetail::where('order_id', $id)->get(); 
        return view('front.product.oder_details', compact('orderDetails'));
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home')->with('success_message', 'Your account has been logged out successfully');
    }
}
