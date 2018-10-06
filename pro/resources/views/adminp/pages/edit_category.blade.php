@extends('index')
@section('edit_category')

    <?php
    $y=Route::input('cat_id');
    $categories=DB::table('categories')
        ->where('cat_id', '=' ,"$y")->get();

    ?>

    @foreach ($categories as $c)


        <div id="page-wrapper">
        <br>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Edit Category: <b style="color:#337ab7;"># {{ Route::input('cat_id') }}</b></h3>


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
                        <form role="form" method="post" action="{{url('/update_category/'.$c->cat_id)}}">
                            {{csrf_field()}}
                            <div class="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input name="cat_name" value="{{$c->cat_name}}" class="form-control" placeholder="Enter Category Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="cat_description" class="form-control" rows="5" placeholder="Enter Category Description">{{$c->cat_description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select name="c_status" class="form-control">
                                                <option value="">Choose status</option>
                                                <option value="publish" {{$c->c_status == 'publish'?"selected":""}}>Published</option>
                                                <option value="hidden" {{$c->c_status == 'hidden'?"selected":""}}>Hidden</option>
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

