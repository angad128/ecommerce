<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;
use Redirect;

session_start();

class ManufactureController extends Controller
{
    
    public function index()
    {
        $this->AdminAuthCheck();
    	$result = DB::table('tbl_manufacture')
                    ->get();
        return view('admin.pages.manufacture.view')->with('data',$result);
    }

    public function create()
    {
        $this->AdminAuthCheck();
        return view('admin.pages.manufacture.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'manufacture_name' => 'required',
            'manufacture_description' => 'required',
            'publication_status' => 'required',
        ]);
        $data = array();
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['publication_status'] = $request->publication_status;
        $data['created_at'] = now();
        $result = DB::table('tbl_manufacture')->insert($data);       
       	Session::put('message','Manufacture Added Successfully!!');
        return Redirect::to('/manufacture/view');
    }

    public function unactive_manufacture($manufacture_id)
    {
    	DB::table('tbl_manufacture')
    			->where('manufacture_id',$manufacture_id)
    			->update(['publication_status'=>0]);
    	Session::put('message','Manufacture successfully Deactivated!!');
    	return Redirect::to('/manufacture/view');
    }

    public function active_manufacture($manufacture_id)
    {
    	DB::table('tbl_manufacture')
    			->where('manufacture_id',$manufacture_id)
    			->update(['publication_status'=>1]);
    	Session::put('message','Manufacture successfully Activated!!');
    	return Redirect::to('/manufacture/view');
    }

    public function edit($manufacture_id)
    {
    	$result = DB::table('tbl_manufacture')
			    		->where('manufacture_id',$manufacture_id)
			    		->first();
    	return view('admin.pages.manufacture.edit')->with('data',$result);
    }

    public function update(Request $request) {
    	$this->validate($request,[
    		'manufacture_id' => 'required',
            'manufacture_name' => 'required',
            'manufacture_description' => 'required',
            'publication_status' => 'required',
        ]);
        $data = array();
        $data['manufacture_name'] = $request->manufacture_name;
        $data['manufacture_description'] = $request->manufacture_description;
        $data['publication_status'] = $request->publication_status;
        $data['updated_at'] = now();
        $result = DB::table('tbl_manufacture')->where('manufacture_id',$request->manufacture_id)->update($data);       
       	Session::put('message','Manufacture Edited Successfully!!');
        return Redirect::to('/manufacture/view');
    }

    public function destroy($manufacture_id) {
        $this->AdminAuthCheck();
    	DB::table('tbl_manufacture')->where('manufacture_id',$manufacture_id)->delete();
    	Session::put('message','Manufacture Deleted Successfully!!');
        return Redirect::to('/manufacture/view');
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

