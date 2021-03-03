@extends('admin.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">All Teacher</h3>
                                <a href="{{ route('add.teacher') }}" class="btn btn-success pull-right">Add Teacher</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                        @foreach($teachers as $teacher)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $teacher->name }}</td>
                                                <td>{{ $teacher->email }}</td>
                                                <td>{{ $teacher->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('teacher.edit', $teacher->id) }}" class="btn btn-info">Edit</a>
                                                    <a href="{{ route('teacher.delete', $teacher->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                </div>
            </section>
            <!-- /.content -->

        </div>
    </div>
    <!-- /.content-wrapper -->



@endsection
