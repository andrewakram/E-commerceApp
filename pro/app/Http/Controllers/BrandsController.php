<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class BrandsController extends Controller
{
    public function get_all_brands(){

        $brands = Brand::orderBy('brand_id','asc')->get();
        return view('adminp.pages.brands',['brands'=>$brands]);
    }

    public function add_brand()
    {
        return view('adminp.pages.add_brand');
    }

    public function insert_brand(Request $request){

        $data = $this->validate(request(), [
            'brand_name'          => 'required',
            'b_status'            => 'required',
            'brand_description'   => 'required',
            'phone'               => 'required',
            'address'             => 'required'
        ],[],[
            'brand_name'            =>'Brand Name',
            'b_status'              =>'Brand Status',
            'brand_description'     =>'Brand Description',
            'phone'                 =>'Brand Phone',
            'address'               =>'Brand Address'
        ]);

        $add                        = new Brand();
        $add->brand_name            = request('brand_name');
        $add->b_status              = request('b_status');
        $add->brand_description     = request('brand_description');
        $add->phone                 = request('phone');
        $add->address               = request('address');
        $add->save();
        session()->flash('insert_message','Record added successfully');

        return redirect('/brands');
    }

    public function edit_brand_page($brand_id){
        return view('adminp.pages.edit_brand');
    }

    public function update_brand(Request $request,$brand_id){
        $data = $this->validate(request(), [
            'brand_name'         => 'required',
            'b_status'           => 'required',
            'brand_description'  => 'required',
            'phone'              => 'required',
            'address'            => 'required'
        ],[],[
            'brand_name'            =>'Brand Name',
            'b_status'              =>'Brand Status',
            'brand_description'     =>'Brand Description',
            'phone'                 =>'Brand Phone',
            'address'               =>'Brand Address'
        ]);

        DB::table('brands')
            ->where('brand_id', $brand_id)
            ->update([
                'brand_name'            =>request('brand_name'),
                'b_status'              =>request('b_status'),
                'brand_description'     =>request('brand_description'),
                'phone'                 =>request('phone'),
                'address'               =>request('address')
            ]);
        session()->flash('insert_message','Record updated successfully');
        return redirect('/brands');
    }

    public function delete_brand($brand_id)
    {
        DB::table('brands')
            ->where('brand_id',$brand_id)
            ->delete();
        return back();
    }


}
