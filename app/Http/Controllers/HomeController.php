<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;

session_start();
class HomeController extends Controller
{
    public function index()
    {
       
    	$all_published_product = DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                    ->where(['tbl_products.publication_status'=>'1'])
                    ->limit(9)
                    ->get();
        return view('pages.index')->with(compact('slider_data','category_data','manufacture_data','all_published_product'));
    }

    public function show_product_by_category($category_id)
    {
        $product_by_category = DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                    ->where(['tbl_products.category_id'=>$category_id,'tbl_products.publication_status'=>'1'])
                    ->limit(18)
                    ->get();
        return view('pages.product_by_category')->with(compact('product_by_category'));
    }

    public function show_product_by_manufacture($manufacture_id)
    {
        $product_by_manufacture = DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                    ->where(['tbl_products.manufacture_id'=>$manufacture_id,'tbl_products.publication_status'=>'1'])
                    ->limit(18)
                    ->get();
        return view('pages.product_by_manufacture')->with(compact('product_by_manufacture'));
    }

    public function productDetails($product_id)
    {
        $product_by_details = DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                    ->where(['tbl_products.product_id'=>$product_id,'tbl_products.publication_status'=>'1'])
                    ->limit(18)
                    ->get();
        return view('pages.product_details')->with(compact('product_by_details')); 
    }

    public function orderSuccess(){
        return view('pages.order_success');   
    }
}
