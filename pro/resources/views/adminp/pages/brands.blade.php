@extends('index')
@section('all_brands')

    <div id="page-wrapper">
        <br>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:#337ab7;">All Brands</h3>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="col-lg-12">
                <div class="table-responsive  ">

                    <form method="post" action="{{ url('/brands/delete/')}}">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="DELETE">

                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Edit</th>
                                <th>Delete</th>
                                <th>#</th>
                                <th>Brand Name</th>
                                <th>Description</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($brands as $brand)
                                <tr id="{{$brand->brand_id}}">
                                    <th><a href="{{URL::to('/edit_brand_page/'.$brand->brand_id)}}" class="btn btn-info" id="">E</a></th>
                                    <th><a href="{{URL::to('/delete_brand/'.$brand->brand_id)}}" class="btn btn-danger" id="deletes">D</a></th>
                                    <th>{{$brand->brand_id}}</th>
                                    <th>{{$brand->brand_name}}</th>
                                    <th>{{$brand->brand_description}}</th>
                                    <th>{{$brand->phone}}</th>
                                    <th>{{$brand->address}}</th>
                                    <th>{{$brand->b_status}}</th>
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