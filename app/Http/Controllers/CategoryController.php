<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;
use Redirect;

class CategoryController extends Controller
{

    public function index()
    {
        $this->AdminAuthCheck();        
    	$result = DB::table('tbl_category')
                    ->get();
        return view('admin.pages.category.view')->with('data',$result);
    }

    public function create()
    {
        $this->AdminAuthCheck();
        return view('admin.pages.category.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required',
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = now();
        $result = DB::table('tbl_category')->insert($data);       
       	Session::put('message','Category Added Successfully!!');
        return Redirect::to('/category/view');
    }

    public function unactive_category($category_id)
    {
    	DB::table('tbl_category')
    			->where('category_id',$category_id)
    			->update(['publication_status'=>0]);
    	Session::put('message','Category successfully Deactivated!!');
    	return Redirect::to('/category/view');
    }

    public function active_category($category_id)
    {
    	DB::table('tbl_category')
    			->where('category_id',$category_id)
    			->update(['publication_status'=>1]);
    	Session::put('message','Category successfully Activated!!');
    	return Redirect::to('/category/view');
    }

    public function edit($category_id)
    {
    	$result = DB::table('tbl_category')
			    		->where('category_id',$category_id)
			    		->first();
    	return view('admin.pages.category.edit')->with('data',$result);
    }

    public function update(Request $request) {
    	$this->validate($request,[
    		'category_id' => 'required',
            'category_name' => 'required',
            'category_description' => 'required',
            'publication_status' => 'required',
        ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['category_description'] = $request->category_description;
        $data['publication_status'] = $request->publication_status;
        $data['updated_at'] = now();
        $result = DB::table('tbl_category')->where('category_id',$request->category_id)->update($data);       
       	Session::put('message','Category Edited Successfully!!');
        return Redirect::to('/category/view');
    }

    public function destroy($category_id) {
        $this->AdminAuthCheck();
    	DB::table('tbl_category')->where('category_id',$category_id)->delete();
    	Session::put('message','Category Deleted Successfully!!');
        return Redirect::to('/category/view');
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
