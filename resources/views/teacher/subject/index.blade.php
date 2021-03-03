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
                                <h3 class="box-title">All Subject</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Subject Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                        @foreach($subjects as $subjects)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $subjects->subject_name }}</td>
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
