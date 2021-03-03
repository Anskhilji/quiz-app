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
                                <h3 class="box-title">All Subject</h3>
                                <a href="{{ route('add.subject') }}" class="btn btn-success pull-right">Add Subject</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Teacher Name</th>
                                            <th>Subject Name</th>
                                            <th>Created_at</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                        @foreach($subjects as $subjects)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $subjects->teacher->name }}</td>
                                                <td>{{ $subjects->subject_name }}</td>
                                                <td>{{ $subjects->created_at->diffForHumans() }}</td>
                                                <td>
                                                    <a href="{{ route('subject.edit', $subjects->id) }}" class="btn btn-info">Edit</a>
                                                    <a href="{{ route('subject.delete', $subjects->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</a>
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
