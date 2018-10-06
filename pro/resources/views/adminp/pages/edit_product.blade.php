@extends('index')
@section('edit_product')

    <?php
    $x=Route::input('product_id');
    $products=DB::table('products')
        ->where('product_id', '=' ,"$x")->get();

    ?>

    @foreach ($products as $p)




    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                        <h3>Edit Product: <b style="color:#337ab7;"># {{ Route::input('product_id') }}</b></h3>


                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session()->has('insert_message'))
                            <hr>
                            {{session()->get('insert_message')}}
                            <hr>
                        @endif


                    </div>

                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/update_product/'.$p->product_id)}}" >
                        {{csrf_field()}}
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" value="{{$p->name}}" class="form-control" placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input name="price" value="{{$p->price}}" class="form-control" placeholder="Enter price">
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input name="quantity" value="{{$p->quantity}}" class="form-control" placeholder="Enter Quantity">
                                    </div>
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <select name="brand_id" class="form-control">
                                            <option value="">Choose Brand Name</option>
                                            <?php
                                            $bran = $p->brand_id;
                                            $getbrands = DB::table('brands')->get();
                                            ?>
                                            @foreach ($getbrands as $brand)
                                            <option value="{{$brand->brand_id}}" {{$brand->brand_id == "$bran"?"selected":""}}>{{$brand->brand_name}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select name="cat_id" class="form-control">
                                            <option value="">Choose Category Name</option>

                                            <?php
                                            $cat = $p->cat_id;
                                            $getcategories = DB::table('categories')->get();

                                            foreach ($getcategories as $category) {?>
                                            <option value="{{$category->cat_id}}" {{$category->cat_id == "$cat"?"selected":""}}>{{$category->cat_name}}</option>

                                            <?php
                                            }
                                            ?>

                                        </select>
                                    </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="des" class="form-control" rows="5" placeholder="Enter Description">{{$p->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Review</label>
                                        <textarea name="review" class="form-control" rows="5"  placeholder="Enter Review">{{$p->review}}</textarea>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Status</label>
                                        <select name="p_status" class="form-control">
                                            <option value="">Choose status</option>
                                            <option value="publish" {{$p->p_status == 'publish'?"selected":""}}>Published</option>
                                            <option value="hidden" {{$p->p_status == 'hidden'?"selected":""}}>Hidden</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label>Choose Image</label>
                                        <input name="image" value="storage/pro_images/{{$p->image}}" class="form-control" type="file">
                                    </div>
                                </div>

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <button type="submit" class="btn btn-info col-lg-12">Save</button>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </form>
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @endforeach


@endsection

