<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Cache\FileStore;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function get_all_products(){

        $products = Product::orderBy('product_id','asc')
            ->join('categories','products.cat_id','=','categories.cat_id')
            ->join('brands','products.brand_id','=','brands.brand_id')->get();
        return view('adminp.pages.products',['products'=>$products]);
    }

    public function add_product()
    {
        return view('adminp.pages.add_product');
    }

     public function insert_product(Request $request){

        $data = $this->validate(request(),
            [
                'name'           =>'required',
                'cat_id'         =>'required',
                'price'          =>'required',
                'quantity'       =>'required',
                'brand_id'       =>'required',
                'p_status'       =>'required',
                'des'            =>'required',
                'review'         =>'required',
                'image'          =>'required'
            ],[],
            [
                'name'           =>'Product Name',
                'cat_id'         =>'Product Category Name',
                'price'          =>'Product Price',
                'quantity'       =>'Product Quantity',
                'brand_id'       =>'Product Brand Name',
                'p_status'       =>'Product Status',
                'des'            =>'Product Description',
                'review'         =>'Product Review',
                'image'          =>'Product Image'
            ]
        );

         if ($request->file('image')){
             $filenameWithExtention= $request->file('image')->getClientOriginalName();
             $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
             $extention=$request->file('image')->getClientOriginalExtension();
             $fileNameStore=$fileName .'_'.time().'.'.$extention;
             $path= $request->file('image')->storeAs('public/pro_images',$fileNameStore);

         $add                = new Product();
         $add->name          = request('name');
         $add->cat_id        = request('cat_id');
         $add->price         = request('price');
         $add->quantity      = request('quantity');
         $add->brand_id      = request('brand_id');
         $add->p_status      = request('p_status');
         $add->description   = request('des');
         $add->review        = request('review');
         $add->image         = $fileNameStore;
         $add->save();
         session()->flash('insert_message','Record added successfully');
         }
         return redirect('products');
         }

    public function edit_page($product_id){
        return view('adminp.pages.edit_product');
    }

    public function update_product(Request $request,$product_id) {
        $data = $this->validate(request(),
            [
                'name'           =>'required',
                'cat_id'         =>'required',
                'price'          =>'required',
                'quantity'       =>'required',
                'brand_id'       =>'required',
                'p_status'       =>'required',
                'des'            =>'required',
                'review'         =>'required',
                'image'          =>'required'
            ],[],
            [
                'name'           =>'Product Name',
                'cat_id'         =>'Product Category Name',
                'price'          =>'Product Price',
                'quantity'       =>'Product Quantity',
                'brand_id'       =>'Product Brand Name',
                'p_status'       =>'Product Status',
                'des'            =>'Product Description',
                'review'         =>'Product Review',
                'image'          =>'Product Image'
            ]
        );

         if ($request->file('image')){
             $filenameWithExtention= $request->file('image')->getClientOriginalName();
             $fileName=pathinfo($filenameWithExtention,PATHINFO_FILENAME);
             $extention=$request->file('image')->getClientOriginalExtension();
             $fileNameStore=$fileName .'_'.time().'.'.$extention;
             $path= $request->file('image')->storeAs('public/pro_images',$fileNameStore);


        DB::table('products')
            ->where('product_id', $product_id)
            ->update([
                'name'           =>request('name'),
                'cat_id'         =>request('cat_id'),
                'price'          =>request('price'),
                'quantity'       =>request('quantity'),
                'brand_id'       =>request('brand_id'),
                'p_status'       =>request('p_status'),
                'description'    =>request('des'),
                'review'         =>request('review'),
                'image'          =>$fileNameStore,
                ]);
         }
            session()->flash('insert_message','Record updated successfully');
        return redirect('/products');
    }

    public function delete_product($product_id)
    {
        DB::table('products')
            ->where('product_id',$product_id)
            ->delete();
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
