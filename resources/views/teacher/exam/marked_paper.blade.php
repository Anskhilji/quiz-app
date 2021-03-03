@extends('teacher.layouts.app')

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
                                <h3 class="box-title">All Marked Paper</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table  class="table table-bordered table-striped example1">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Student Name</th>
                                            <th>Subject</th>
                                            <th>Obtained Marks</th>
                                            <th>Total Marks</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                        @foreach($attempted as $attempt)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $attempt->name }}</td>
                                                <td>{{ $attempt->subject_name }}</td>
                                                <td>{{ $attempt->obtained_marks }}</td>
                                                <td>{{ $attempt->total_marks }}</td>
                                                <td>
                                                    <a href="{{ route('view.marked.paper',$attempt->id) }}" class="btn btn-info">Edit Result</a>
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
