@extends('index')
@section('edit_brand')

    <?php
    $z=Route::input('brand_id');
    $brands=DB::table('brands')
        ->where('brand_id', '=' ,"$z")->get();

    ?>

    @foreach ($brands as $b)


        <div id="page-wrapper">
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Edit Brand: <b style="color:#337ab7;"># {{ Route::input('brand_id') }}</b></h3>


                            @if($errors->has('brand_name') or
                            $errors->has('b_status') or
                            $errors->has('brand_description')or
                            $errors->has('phone') or
                            $errors->has('address'))
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
                            <form role="form" method="post" action="{{url('/update_brand/'.$b->brand_id)}}">
                                {{csrf_field()}}
                                <div class="">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input name="brand_name" value="{{$b->brand_name}}" class="form-control" placeholder="Enter Brand Name">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="brand_description" class="form-control" rows="5" placeholder="Enter Brand Description">{{$b->brand_description}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input name="address" value="{{$b->address}}" class="form-control" placeholder="Enter Brand Address">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Phone</label>
                                                <input name="phone" value="{{$b->phone}}" class="form-control" placeholder="Enter Brand Phone">
                                            </div>
                                            <div class="form-group col-lg-6">
                                                <label>Status</label>
                                                <select name="b_status" class="form-control">
                                                    <option value="">Choose status</option>
                                                    <option value="publish" {{$b->b_status == 'publish'?"selected":""}}>Published</option>
                                                    <option value="hidden" {{$b->b_status == 'hidden'?"selected":""}}>Hidden</option>
                                                </select>
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

