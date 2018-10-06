@extends('index')
@section('add_category')

    <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 style="color:#337ab7;">Add New Category</h3>


                        @if($errors->has('cat_name') or
                        $errors->has('c_status') or
                        $errors->has('description'))
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
                        <form role="form" method="post" action="{{url('/insert_category')}}" >
                            {{csrf_field()}}
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="cat_name" class="form-control" placeholder="Enter Category Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="cat_description" class="form-control" rows="5" placeholder="Enter Category Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="c_status" class="form-control">
                                                <option value="">Choose status</option>
                                                <option value="publish">Published</option>
                                                <option value="hidden">Hidden</option>
                                            </select>
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

