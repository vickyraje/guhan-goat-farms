<?php

namespace App\Http\Controllers\Front;

use App\{
   Helpers\Helper,
   Http\Controllers\Controller
};
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = [];
        return view('frontend.home.index', compact('sliders'));
    }

    /**
     * Display a about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('frontend.about');
    }

    /**
     * Display a service page.
     *
     * @return \Illuminate\Http\Response
     */
    public function service()
    {
        return view('frontend.service');
    }

    /**
     * Display a package page.
     *
     * @return \Illuminate\Http\Response
     */
    public function package()
    {
        return view('frontend.package');
    }

    /**
     * Display a destination page.
     *
     * @return \Illuminate\Http\Response
     */
    public function destination()
    {
        return view('frontend.destination');
    }

    /**
     * Display a guide page.
     *
     * @return \Illuminate\Http\Response
     */
    public function guide()
    {
        return view('frontend.guide');
    }

    /**
     * Display a testimonial page.
     *
     * @return \Illuminate\Http\Response
     */
    public function testimonial()
    {
        return view('frontend.testimonial');
    }

    /**
     * Display a blog page.
     *
     * @return \Illuminate\Http\Response
     */
    public function blog()
    {
        return view('frontend.blog');
    }

    /**
     * Display a contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Display the quick order listing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function quickOrder()
    {
        if(Auth::guard('customer')->check())
        {
            $products = Product::whereHas('vendors', function($query) { $query->where('activate', 1);})->where('status', 1)->groupBy('category')->get();
            return view('frontend.quick_order', compact('products'));
        } else {
            return redirect(url('/sign-in'));
        }

    }

    /**
     * Display the quick order listing page.
     *
     * @return \Illuminate\Http\Response
     */
    public function quickOrderAjax(Request $request)
    {
        if(Auth::guard('customer')->check())
        {
            if ($request->category) {
                $products = Product::with('vendors:id,activate')->whereHas('vendors', function($query) { $query->where('activate', 1);})->where(['status' => 1, 'category' => $request->category])->get();
            } else {
                $products = Product::with('vendors:id,activate')->whereHas('vendors', function($query) { $query->where('activate', 1);})->where('status', 1)->get();
            }
            return view('frontend.quick_order_ajax', compact('products'));
        } else {
            return redirect(url('/sign-in'));
        }
    }

    /**
     * Display a product details page.
     *
     * @return \Illuminate\Http\Response
     */
    public function productInfo(Request $request)
    {
        $product = Product::whereHas('vendors', function($query) { $query->where('activate', 1);})->where('id', $request->pid)->first();
        echo $product;
    }

    /**
     * Save add to cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request)
    {
        $input = $request->all();
        $cartMainQuery = AddtoCart::where(['user_id' => Auth::guard('customer')->user()->id, 'pid' => $request->pid]);
        $cartProductCheck = $cartMainQuery->count();
        if($cartProductCheck == 0){
            $vendor = Product::select('vid')->where('id', $request->pid)->first();
            $input['user_id']       = Auth::guard('customer')->user()->id;
            $input['vid']           = $vendor->vid;
            $input['created_at']    = date('Y-m-d H:i:s');
            AddtoCart::insert($input);
        } else {
            $cart = $cartMainQuery->first();
            if($input['qty'] == 0){
                AddtoCart::where('id', $cart->id)->delete();
            } else {
                AddtoCart::where('id', $cart->id)->update($input);
            }
        }
    }

    /**
     * Register a new user page.
     *
     * @return \Illuminate\Http\Response
     */
    public function signUp(Request $request)
    {
        /*if(Auth::guard('customer')->check())
        {
            return redirect(url('/'));
        } else {*/
            if($request->post()){
                $request->validate([
                    'name'      => 'required',
                    'email'     => 'required|unique:customers,email',
                    'mobile'    => 'required|numeric|unique:customers,mobile',
                    'area'      => 'required',
                    'address'   => 'required',
                    'city'      => 'required',
                    'postcode'  => 'required|numeric',
                    'password'  => 'required|string|confirmed|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                    'password_confirmation' => 'required|string|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
                    'terms'     => 'accepted',
                ],[
                    'password.regex'                => 'Password must be a minimum 8 characters contains a combination of uppercase and lowercase letter and number are required.',
                    'password_confirmation.regex'   => 'Confirm Password must be a minimum 8 characters contains a combination of uppercase and lowercase letter and number are required.'
                ]);
                $input = $request->except(['_token', '_method', 'door_no', 'password_confirmation', 'terms']);
                /*$input['address'] = $request->door_no ? $request->door_no.", ".($request->address?$request->address:'') : $request->address;*/
                $input['address'] = json_encode(['door_no' => $request->door_no, 'address' => $request->address]);
                $input['password'] = Hash::make($request->password);
                $input['password1'] = $request->password;
                Customer::insert($input);
                return redirect()->route('sign-up')->with('success', 'Registered Successfully.');
            }
            return view('frontend.sign-up');
        /*}*/
    }

    /**
     * Forgot Password page
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(Request $request)
    {
        return view('frontend.forgot_password');
    }

    /**
     * Reservation page
     *
     * @return \Illuminate\Http\Response
     */
    public function reservation(Request $request)
    {
        return view('frontend.reservation');
    }

    /**
     * login a user page.
     *
     * @return \Illuminate\Http\Response
     */
    public function signIn(Request $request)
    {
        /*if(Auth::guard('customer')->check())
        {
            return redirect(url('/'));
        } else {*/
            if($request->post()){
                $request->validate([
                    'username'  => 'required',
                    'password'  => 'required',
                ]);
                if(is_numeric($request->username)){
                    $loginType = 'mobile';
                } else {
                    $loginType = 'email';
                }
                $credentials = [$loginType => $request->username, 'password' => $request->password];
                if(Auth::guard('customer')->attempt($credentials)):
                    return redirect()->intended(url('/'));
                endif;

                return redirect(url('/sign-in'))->with('warning', 'Username or password does not matched');
            }
            return view('frontend.sign-in');
        /*}*/
    }

    /**
     * logout a customer page.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if(Auth::guard('customer')->check())
        {
            Auth::guard('customer')->logout();
        }
        return redirect(url('/'));
    }

    /**
     * Checkout page.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        if(Auth::guard('customer')->check())
        {
            if($request->post()){
                $request->validate([
                    'name'              => 'required',
                    'mobile'            => 'required',
                    'address'           => 'required',
                    'postcode'          => 'required|numeric',
                    'email'             => 'required',
                    'ship-box'          => 'nullable',
                    'shipping_name'     => 'required_with:ship-box,checked',
                    'shipping_mobile'   => 'required_with:ship-box,checked',
                    'shipping_address'  => 'required_with:ship-box,checked',
                    'shipping_postcode' => 'required_with:ship-box,checked',
                    'shipping_email'    => 'required_with:ship-box,checked',
                ]);
                $input = $request->all();
                $order['billing_address'] = json_encode(['name' => $request->name, 'email' => $request->email, 'mobile' => $request->mobile, 'address' => ($request->door_no?$request->door_no.", ".$request->address:$request->address), 'postcode' => $request->postcode]);
                if(isset($request->ship_box)){
                    $order['shipping_address'] = json_encode(['name' => $request->shipping_name, 'email' => $request->shipping_email, 'mobile' => $request->shipping_mobile, 'address' => ($request->shipping_door_no?$request->shipping_door_no.", ".$request->shipping_address:$request->shipping_address), 'postcode' => $request->shipping_postcode]);
                } else {
                    $order['shipping_address'] = json_encode(['name' => $request->name, 'email' => $request->email, 'mobile' => $request->mobile, 'address' => ($request->door_no?$request->door_no.", ".$request->address:$request->address), 'postcode' => $request->postcode]);
                }
                $order['user_id']   = Auth::guard('customer')->user()->id;

                $vendorCarts = AddtoCart::select('vid')->where('user_id', Auth::guard('customer')->user()->id)->groupBy('vid')->get();
                foreach($vendorCarts as $vendorCart){
                    $sub_total = $shipping = 0;
                    $carts = AddtoCart::where(['user_id' => Auth::guard('customer')->user()->id, 'vid' => $vendorCart->vid])->get();
                    foreach($carts as $cart){
                        $sub_total+= $cart->products->offer_price ? ($cart->products->offer_price*$cart->qty) : ($cart->products->selling_price*$cart->qty);
                        if($cart->products->free_shipping == 'price'){
                            $shipping+=($cart->qty >= $cart->products->price_shipping_amt?0:30);
                        } else if($cart->products->free_shipping == 'qty'){
                            $shipping+=($cart->qty >= $cart->products->qty_shipping_amt?0:30);
                        }
                        $products[] = ['pid' => $cart->pid, 'qty' => $cart->qty, 'price' => $cart->products->offer_price ? $cart->products->offer_price : $cart->products->selling_price];
                    }

                    /* Order ID Generate start */
                    $lastOrderMainQuery = Order::latest('id');
                    $lastOrderCheck = $lastOrderMainQuery->count();
                    if($lastOrderCheck == 0){
                        $orderID = 'MC'.date('Ym')."0000001";
                    } else {
                        $lastOrderGet = $lastOrderMainQuery->first(); $lastOrderGet = $lastOrderGet->order_id;
                        $explodeData = substr($lastOrderGet, 0, 8);
                        $order_id = substr($lastOrderGet, 8, 15);
                        $unique = str_pad(++$order_id, 7, '0', STR_PAD_LEFT);
                        $orderID = $explodeData.$unique;
                    }
                    /* Order ID Generate end */

                    $order['order_id']  = $orderID;
                    $order['vid']       = $vendorCart->vid;
                    $order['subtotal']  = $sub_total;
                    $order['shipping']  = $shipping;
                    $order['total']     = $sub_total+$shipping;
                    $order['products']  = json_encode($products);
                    $order['created_at']= date('Y-m-d H:i:s');
                    if(Order::insert($order)){
                        AddtoCart::where(['user_id' => Auth::guard('customer')->user()->id, 'vid' => $vendorCart->vid])->delete();
                    }
                    $products = [];
                }
                return redirect(url('/'))->with('success', 'Order Placed Successfully');
            }
            $carts = AddtoCart::where('user_id', Auth::guard('customer')->user()->id)->get();
            return view('frontend.checkout', compact('carts'));
        } else {
            return redirect(url('/'));
        }
    }

    /**
     * Quick cart page.
     *
     * @return \Illuminate\Http\Response
     */
    public function quickCart()
    {
        $total          = 0;
        $cartMainQuery  = AddtoCart::where('user_id', Auth::guard('customer')->user()->id);
        $cartCount      = $cartMainQuery->count();
        $carts          = $cartMainQuery->get();
        foreach($carts as $cart){
            $total+= ($cart->qty*($cart->products->offer_price ? $cart->products->offer_price : $cart->products->selling_price));
        }
        return view('frontend.quick_cart', compact('carts', 'cartCount', 'total'));
    }

    /**
     * My order page.
     *
     * @return \Illuminate\Http\Response
     */
    public function myOrders()
    {
        $orders = [];
        if(Auth::guard('customer')->check()){
            $orders = Order::where('user_id', Auth::guard('customer')->user()->id)->orderBy('id', 'DESC')->paginate(5);
            return view('frontend.my-order', compact('orders'));
        } else {
            return redirect(url('/'));
        }
    }

    /**
     * Vendor register page.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendor(Request $request)
    {
        if($request->post()){
            $vendorMainQuery = Vendor::where('mobile', $request->mobile);
            $checkMobile = $vendorMainQuery->count();
            if($checkMobile == 0){
                $request->validate([
                    'business_name' => 'required',
                    'proof_type'    => 'required',
                    'proof_no'      => 'required|unique:vendors,proof_no',
                    'name'          => 'required',
                    'email'         => 'nullable|email|unique:vendors,email',
                    'mobile'        => 'required|numeric|digits:10|unique:vendors,mobile',
                    'area'          => 'required',
                    'terms'         => 'accepted',
                ],[
                    'business_name.required'=> 'Company Name Required',
                    'name.required'         => 'Vendor Name Required',
                    'mobile.required'       => 'WhatsApp Number Required',
                ]);

                $input = $request->except('_method', '_token', 'door_no', 'terms');
                $input['slug'] = Helper::slugify($request->business_name);
                $input['created_at'] = date('Y-m-d H:i:s');
                $input['password'] = Hash::make($request->mobile);
                $input['password1'] = $request->mobile;
                Vendor::insert($input);
                return view('frontend.payment', compact('input'));
            } else {
                $checkVendorPayment = $vendorMainQuery->where('payment', 0)->count();
                if($checkVendorPayment == 0){
                    $input = $vendorMainQuery->first();
                    return redirect(url('/vendor-payment'))->with('warning', "You are already registered with us, but payment has not been made.");
                } else {
                    return redirect(url('/sign-in'))->with('warning', "You\'re already registered with us login");
                }
            }
        }
        $areas = Area::where('status', 1)->orderBy('id', 'ASC')->get();
        $proof_types = Helper::proofType();
        return view('frontend.vendor', compact('areas', 'proof_types'));
    }

    /**
     * Vendor payment page.
     *
     * @return \Illuminate\Http\Response
     */
    public function payment(Request $request)
    {
        return view('frontend.payment');
    }

    /**
     * Slug page.
     *
     * @return \Illuminate\Http\Response
     */
    public function slug(Request $request, $slug)
    {
        $product = Product::whereRelation('vendors', 'activate', '=', 1)->where('slug', $slug)->first();
        if($product){
            return view('frontend.product', compact('product'));
        } else {
            return redirect(url('/'));
        }
    }
}
