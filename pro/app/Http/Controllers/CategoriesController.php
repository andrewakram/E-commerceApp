<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CategoriesController extends Controller
{
    public function get_all_categories(){

        $categories = Category::orderBy('cat_id','asc')->get();
        return view('adminp.pages.categories',['categories'=>$categories]);
    }

    public function add_category()
    {
        return view('adminp.pages.add_category');
    }

    public function insert_category(Request $request){

        $data = $this->validate(request(), [
            'cat_name'          => 'required',
            'c_status'          => 'required',
            'cat_description'   => 'required'
        ],[],[
            'cat_name'         =>'Category Name',
            'c_status'         =>'Category Status',
            'cat_description'  =>'Category Description',
        ]);

            $add                    = new Category();
            $add->cat_name          = request('cat_name');
            $add->c_status          = request('c_status');
            $add->cat_description   = request('cat_description');
            $add->save();
            session()->flash('insert_message','Record added successfully');

        return redirect('/categories');
    }

    public function edit_cat_page($product_id){
        return view('adminp.pages.edit_category');
    }

    public function update_category(Request $request,$cat_id){
        $data = $this->validate(request(), [
            'cat_name'           => 'required',
            'c_status'           => 'required',
            'cat_description'    => 'required'
        ],[],[
            'cat_name'         =>'Category Name',
            'c_status'         =>'Category Status',
            'cat_description'  =>'Category Description',
        ]);

        DB::table('categories')
            ->where('cat_id', $cat_id)
            ->update([
                'cat_name'            =>request('cat_name'),
                'c_status'            =>request('c_status'),
                'cat_description'     =>request('cat_description'),
            ]);
    session()->flash('insert_message','Record updated successfully');
    return redirect('/categories');
    }

    public function delete_category($cat_id)
    {
        DB::table('categories')
            ->where('cat_id',$cat_id)
            ->delete();
        return back();
    }

}
