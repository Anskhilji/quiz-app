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
                            <h4 class="box-title">Update Password</h4>
                        </div>

                        <form class="form-horizontal form-element" action="{{ route('teacher.update.password') }}" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="old_password" class="form-control" id="inputPassword3" placeholder="Old Password">
                                        <span class="text-danger">@error('old_password'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="New Password">
                                        <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 control-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password_confirmation" class="form-control" id="inputPassword3" placeholder="Re-type password">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type="submit" class="btn btn-rounded btn-info pull-right">Update Password</button>
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
