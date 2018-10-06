@extends('index')
@section('all_categories')

    <div id="page-wrapper">
        <br>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:#337ab7;">All Categories</h3>
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
                                <th>Category Name</th>
                                <th>Description</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr id="{{$category->cat_id}}">
                                    <th><a href="{{URL::to('/edit_cat_page/'.$category->cat_id)}}" class="btn btn-info" id="">E</a></th>
                                    <th><a href="{{URL::to('/delete_category/'.$category->cat_id)}}" class="btn btn-danger" id="deletes">D</a></th>
                                    <th>{{$category->cat_id}}</th>
                                    <th>{{$category->cat_name}}</th>
                                    <th>{{$category->cat_description}}</th>
                                    <th>{{$category->c_status}}</th>
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