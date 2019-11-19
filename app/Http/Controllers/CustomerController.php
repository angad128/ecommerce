<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;
use Redirect;

session_start();

class CustomerController extends Controller
{
    public function login(Request $request)
    {
        $this->validate($request,[
            'customer_email' => 'required|email',
            'password' => "required|min:6"
        ]);
        $customer_email = $request->customer_email;
        $password = md5($request->password);
        $result = DB::table('tbl_customer')
                    ->where('customer_email',$customer_email)
                    ->where('password',$password)
                    ->first();
        if ($result) {
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        } else {
            Session::put('message','Email or Password Invalid.');
            return Redirect::to('/login-check');
        }
    }

    public function logout()
    {
        Session::flush();
        return Redirect::to('/login-check');
    }
}
