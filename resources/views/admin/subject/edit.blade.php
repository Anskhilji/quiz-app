@extends('admin.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Update Subject</h4>
                                <a href="{{ route('all.subject') }}" class="btn btn-success pull-right">All Subject</a>
                            </div>

                            <form class="form-horizontal form-element" action="{{ route('update.subject', $subjects->id) }}" method="post">
                                @csrf
                                <div class="box-body">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Subject Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="subject_name" value="{{ $subjects->subject_name }}" class="form-control" id="inputEmail3" placeholder="Enter subject">
                                            <span class="text-danger">@error('subject_name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 control-label">Teacher Name</label>
                                        <select class="form-control col-sm-10" name="teacher_id">
                                            <option selected disabled>Choose an option</option>
                                            @foreach($teachers as $teacher)
                                                <option value="{{ $teacher->id }}" {{ $teacher->id == $subjects->teacher_id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger col-sm-10 offset-2">@error('teacher_id'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-info pull-right">Update Subject</button>
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
