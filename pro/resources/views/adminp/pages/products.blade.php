@extends('index')
@section('all_products')

<div id="page-wrapper">
    <br>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="color:#337ab7;">All Products</h3>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

            <div class="col-lg-12">
                <div class="table-responsive  ">

                <form method="post" action="{{ url('/products/delete/')}}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="DELETE">

                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Edit</th>
                            <th>Delete</th>
                            <th>#</th>
                            <th>Name</th>
                            <th>Cat Name</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Brand Name</th>
                            <th>Review</th>
                            <th>Percentage Offer</th>
                            <th>Rate</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                        <tr id="{{$product->product_id}}">
                            <th><a href="{{URL::to('/edit_page/'.$product->product_id)}}" class="btn btn-info" id="">E</a></th>
                            <th><a href="{{URL::to('/delete_product/'.$product->product_id)}}" class="btn btn-danger" id="deletes">D</a></th>
                            <th>{{$product->product_id}}</th>
                            <th>{{$product->name}}</th>
                            <th>{{$product->cat_name}}</th>
                            <th>{{$product->price}}</th>
                            <th>{{$product->description}}</th>
                            <th><img src="storage/pro_images/{{$product->image}}" alt="{{$product->image}}" width="40px" height="40px"></th>
                            <th>{{$product->quantity}}</th>
                            <th>{{$product->brand_name}}</th>
                            <th>{{$product->review}}</th>
                            <th>{{$product->percentage_offer}}</th>
                            <th>{{$product->rate}}</th>
                            <th>{{$product->p_status}}</th>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.col-lg-4 (nested) -->

    </div>
</div>
@endsection