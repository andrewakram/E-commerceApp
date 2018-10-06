@extends('index')
@section('add_product')

    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:#337ab7;">Add New Product</h3>

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

                    <div class="panel-body">
                    <form role="form" method="post" enctype="multipart/form-data" action="{{url('/insert_product')}}" >
                    {{csrf_field()}}
                    <div class="">
                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" class="form-control" placeholder="Enter Product Name">
                                        </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input name="price" class="form-control" placeholder="Enter Product price">
                                    </div>
                                    <div class="form-group">
                                        <label>Quantity</label>
                                        <input name="quantity" class="form-control" placeholder="Enter Product Quantity">
                                    </div>
                                <div class="form-group">
                                    <label>Brand Name</label>
                                    <select name="brand_id" class="form-control">
                                        <option value="">Choose Brand Name</option>
                                        <?php
                                            $getallbrands = DB::table('brands')->get();
                                            foreach ($getallbrands as $brand) {?>
                                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                         <?php   } ?>


                                    </select>
                                </div>
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select name="cat_id" class="form-control">
                                            <option value="">Choose Category Name</option>

                                            <?php
                                            $getallcats = DB::table('categories')->get();
                                            foreach ($getallcats as $cat) {?>
                                            <option value="{{$cat->cat_id}}">{{$cat->cat_name}}</option>
                                            <?php   } ?>
                                        </select>
                                    </div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="des" class="form-control" rows="5" placeholder="Enter Product Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Review</label>
                                    <textarea name="review" class="form-control" rows="5"  placeholder="Enter Product Review"></textarea>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Status</label>
                                    <select name="p_status" class="form-control">
                                        <option value="">Choose status</option>
                                        <option value="publish">Published</option>
                                        <option value="hidden">Hidden</option>
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Choose Product Image</label>
                                    <input name="image" type="file" class="form-control">
                                </div>
                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <button type="submit" class="btn btn-success col-lg-12">Save</button>
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

@endsection

