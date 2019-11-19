<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;
use Redirect;
use Image;

class ProductController extends Controller
{


    public function index()
    {
        $this->AdminAuthCheck();
    	$result = DB::table('tbl_products')
                    ->join('tbl_category','tbl_products.category_id','=','tbl_category.category_id')
                    ->join('tbl_manufacture','tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
                    ->select('tbl_products.*','tbl_category.category_name','tbl_manufacture.manufacture_name')
                    ->get();
        return view('admin.pages.product.view')->with('data',$result);
    }

    public function create()
    {
        $this->AdminAuthCheck();
        $category_data = DB::table('tbl_category')->where('publication_status',1)->get();
        $manufacture_data = DB::table('tbl_manufacture')->where('publication_status',1)->get();
        return view('admin.pages.product.create')->with(compact('category_data','manufacture_data'));;
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'product_name' => 'required',
            'category_id' => 'required',
            'manufacture_id' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_price' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
            'publication_status' => 'required',
        ]);
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['publication_status'] = $request->publication_status;


        $image = $request->file('product_image');
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/product/image');
            $success = $image->move($destinationPath, $imagename);
            if($success){
                $data['product_image'] = $imagename;
                Session::put('message','Product Successfully Edited With Image!');
                DB::table('tbl_products')->insert($data);
                return Redirect::to('/product/view');   
            }
            
        } 
        $data['product_image'] = '';
        DB::table('tbl_products')->insert($data);
        return Redirect::to('/product/view');   
    }

    public function unactive_product($product_id)
    {
    	DB::table('tbl_products')
    			->where('product_id',$product_id)
    			->update(['publication_status'=>0]);
    	Session::put('message','product successfully Deactivated!!');
    	return Redirect::to('/product/view');
    }

    public function active_product($product_id)
    {
    	DB::table('tbl_products')
    			->where('product_id',$product_id)
    			->update(['publication_status'=>1]);
    	Session::put('message','product successfully Activated!!');
    	return Redirect::to('/product/view');
    }

    public function edit($product_id)
    {
    	$data = DB::table('tbl_products')->where('product_id',$product_id)->first();
        $category_data = DB::table('tbl_category')->where('publication_status',1)->get();
        $manufacture_data = DB::table('tbl_manufacture')->where('publication_status',1)->get();
    	return view('admin.pages.product.edit')->with(compact('data','category_data','manufacture_data'));
    }

    public function update(Request $request) {
    	$this->validate($request,[
            'product_id' => 'required',
    		'product_name' => 'required',
            'category_id' => 'required',
            'manufacture_id' => 'required',
            'product_short_description' => 'required',
            'product_long_description' => 'required',
            'product_price' => 'required',
            'product_size' => 'required',
            'product_color' => 'required',
        ]);
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['category_id'] = $request->category_id;
        $data['manufacture_id'] = $request->manufacture_id;
        $data['product_short_description'] = $request->product_short_description;
        $data['product_long_description'] = $request->product_long_description;
        $data['product_price'] = $request->product_price;
        $data['product_size'] = $request->product_size;
        $data['product_color'] = $request->product_color;
        $data['updated_at'] = now();

        $image = $request->file('product_image');
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/product/image');
            $success = $image->move($destinationPath, $imagename);
            if($success){
                $data['product_image'] = $imagename;
                Session::put('message','Product Successfully Edited With Image!');
                $result = DB::table('tbl_products')->where('product_id',$request->product_id)->update($data);       
                return Redirect::to('/product/view'); 
            }
            
        } 
        $data['product_image'] = '';
        $result = DB::table('tbl_products')->where('product_id',$request->product_id)->update($data);       
        return Redirect::to('/product/view'); 
    }

    public function destroy($product_id) {
        $this->AdminAuthCheck();
    	DB::table('tbl_products')->where('product_id',$product_id)->delete();
    	Session::put('message','product Deleted Successfully!!');
        return Redirect::to('/product/view');
    }

    private function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return;
        } else {
            return Redirect::to('admin')->send();
        }
    }

}

