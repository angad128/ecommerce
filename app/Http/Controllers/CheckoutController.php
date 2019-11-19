<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;
use Cart;
use Redirect;

session_start();

class CheckoutController extends Controller
{

    public function checkLogin()
    {      
        return view('pages.login');
    }

    public function registration(Request $request)
    {
        $this->validate($request,[
            'customer_name' => 'required',
            'customer_email' => 'required|email|unique:tbl_customer',
            'password' => "required|min:6",
            'mobile_number' => 'required'
        ]);
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['password'] = md5($request->password);
        $data['mobile_number'] = $request->mobile_number;
        $data['created_at'] = now();
        $result_id = DB::table('tbl_customer')->insertGetId($data);       
        Session::put('customer_id', $result_id);
        Session::put('customer_name', $data['customer_name']);
        return Redirect::to('/checkout');
    }

    public function checkout()
    {  
        return view('pages.checkout');
    }

    public function storeShippingDetails(Request $request)
    {
        $this->validate($request,[
            'shipping_email' => 'required|email',
            'shipping_fname' => "required",
            'shipping_lname' => "required",
            'shipping_address' => "required",
            'phone' => 'required',
            'city' => 'required'
        ]);
        $data = array();
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_fname'] = $request->shipping_fname;
        $data['shipping_lname'] = $request->shipping_lname;
        $data['shipping_address'] = $request->shipping_address;
        $data['phone'] = $request->phone;
        $data['city'] = $request->city;
        $data['created_at'] = now();
        $result_id = DB::table('tbl_shipping')->insertGetId($data);       
        Session::put('shipping_id', $result_id);
        return Redirect::to('/payment');
    }

    public function payment()
    {
        $cart_contents = Cart::getContent();
        $all_published_category = DB::table('tbl_category')
                                        ->where('publication_status',1)
                                        ->get();
        return view('pages.payment')->with(compact('cart_contents','all_published_category'));
    }


}
