@extends('teacher.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Edit Profile</h4>
                            </div>

                            <form class="form-horizontal form-element" action="{{ route('teacher.update.profile', $auth->id) }}" method="post">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" value="{{ $auth->name }}" class="form-control" id="inputEmail3" placeholder="Enter Name">
                                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" value="{{ $auth->email }}" class="form-control" id="inputEmail3" placeholder="Email">
                                            <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-info pull-right">Update</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                        <!-- /.box -->
                        <!-- general form elements disabled -->
                        <!-- /.box -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->

@endsection
