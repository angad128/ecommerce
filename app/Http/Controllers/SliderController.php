<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;
use Redirect;

class SliderController extends Controller
{

    public function index()
    {
        $this->AdminAuthCheck();        
    	$result = DB::table('tbl_slider')
                    ->get();
        return view('admin.pages.slider.view')->with('data',$result);
    }

    public function create()
    {
        $this->AdminAuthCheck();
        return view('admin.pages.slider.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request,[
            'publication_status' => 'required',
            'slider_image' => 'required|image',
        ]);
        $data = array();
        $data['publication_status'] = $request->publication_status;
        $image = $request->file('slider_image');
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/slider/image');
            $success = $image->move($destinationPath, $imagename);
            if($success){
                $data['slider_image'] = $imagename;
                Session::put('message','Slider Successfully Adder!');
                DB::table('tbl_slider')->insert($data);
                return Redirect::to('/slider/view');   
            }  
        }   
    }

    public function unactive_slider($slider_id)
    {
    	DB::table('tbl_slider')
    			->where('slider_id',$slider_id)
    			->update(['publication_status'=>0]);
    	Session::put('message','slider successfully Deactivated!!');
    	return Redirect::to('/slider/view');
    }

    public function active_slider($slider_id)
    {
    	DB::table('tbl_slider')
    			->where('slider_id',$slider_id)
    			->update(['publication_status'=>1]);
    	Session::put('message','slider successfully Activated!!');
    	return Redirect::to('/slider/view');
    }

    public function edit($slider_id)
    {
    	$result = DB::table('tbl_slider')
			    		->where('slider_id',$slider_id)
			    		->first();
    	return view('admin.pages.slider.edit')->with('data',$result);
    }

    public function update(Request $request) {
    	$this->validate($request,[
            'slider_id' => 'required',
        ]);
        $data = array();
        $data['updated_at'] = now();
        $image = $request->file('slider_image');
        if ($image) {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('images/slider/image');
            $success = $image->move($destinationPath, $imagename);
            if($success){
                $data['slider_image'] = $imagename;
                Session::put('message','Slider Successfully Edited!');
                 $result = DB::table('tbl_slider')->where('slider_id',$request->slider_id)->update($data);      
                return Redirect::to('/slider/view');   
            }  
        } 

        $result = DB::table('tbl_slider')->where('slider_id',$request->slider_id)->update($data);       
       	Session::put('message','Slider Edited Successfully!!');
        return Redirect::to('/slider/view');
    }

    public function destroy($slider_id) {
        $this->AdminAuthCheck();
    	DB::table('tbl_slider')->where('slider_id',$slider_id)->delete();
    	Session::put('message','slider Deleted Successfully!!');
        return Redirect::to('/slider/view');
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
