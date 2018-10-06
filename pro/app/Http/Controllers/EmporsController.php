<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EmporsController extends Controller
{
    public function empor()
    {

        $all_p = DB::table('products')
            ->get();


        $slider = DB::table('products')
            ->where('p_status','=','publish')
            ->limit(3)->offset(9)
            ->get();


        $hot_product = DB::table('products')
            ->where('p_status','=','publish')
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        $new_product = DB::table('products')
            ->where('p_status','=','publish')
            ->orderBy('created_at', 'asc')
            ->limit(2)->offset(2)
            ->get();

        $offer = DB::table('products')
            ->where('p_status','=','publish')
            ->where('percentage_offer','!=','null')
            ->get();

        $hot_and_offer = DB::table('products')
            ->where('p_status','=','publish')
            ->where('percentage_offer','!=','null')
            ->orderBy('updated_at', 'asc')
            ->limit(2)
            ->get();

        $no_offers = DB::table('products')
            ->where('p_status','=','publish')
            ->where('percentage_offer','=','0')
            ->get();

        return view('empor',[
            'all_p'=>$all_p,
            'slider'=>$slider,
            'hot_product'=>$hot_product,
            'new_product'=>$new_product,
            'offer'=>$offer,
            'hot_and_offer'=>$hot_and_offer,
            'no_offers'=>$no_offers
            ]
        );
    }

    public function show_hot_product($product_id)
    {
        echo $product_id;

    }
}



/*@foreach($x_product as $d)

           select * from (select * from product oreder by date desce )
where rownum = 3




                            <img style="width:341px; height:400px;" src="storage/pro_images/{{$d->image}}" alt="">
    @endforeach*/