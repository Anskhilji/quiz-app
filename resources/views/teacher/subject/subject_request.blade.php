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
                                <h3 class="box-title">Subject Request</h3>
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
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                            @foreach($requests as $request)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $request->user }}</td>
                                                    <td>{{ $request->subject_name }}</td>
                                                    <td>
                                                        @if($request->status == 1)
                                                            <span class="badge badge-success">Approved</span>
                                                        @else
                                                            <span class="badge badge-danger">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($request->status == 1)
                                                            <a href="{{ route('teacher.request.inactive', $request->id) }}" class="btn btn-danger" title="Inactive"><i class="fa fa-times"></i></a>
                                                        @else
                                                            <a href="{{ route('teacher.request.active', $request->id) }}" class="btn btn-info" title="Active"><i class="fa fa-check"></i></a>
                                                        @endif
                                                        <a href="{{ route('teacher.request.delete', $request->id) }}" onclick="return confirm('Are your sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
