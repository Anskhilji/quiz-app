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
                                <h3 class="box-title">All MCQs</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table  class="table table-bordered table-striped example1">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Subject Name</th>
                                            <th>Question</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                        @foreach($papers as $paper)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $paper->subject->subject_name ?? '' }}</td>
                                                <td>{{ $paper->question }}</td>
                                                <td>
                                                    <a href="{{ route('edit.mcqs', $paper->id) }}" class="btn btn-info btn-sm"><i class="si si-note"></i></a>
                                                    <a href="{{ route('delete.mcqs', $paper->id) }}" onclick="return confirm('Are your sure?')" class="btn btn-danger btn-sm"><i class="si si-trash"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">All Subjective</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped example1">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Subject Name</th>
                                            <th>Question</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php($i=1)
                                        @foreach($texts as $text)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $text->subject->subject_name ?? '' }}</td>
                                                <td>{{ $text->question }}</td>
                                                <td>
                                                    <a href="{{ route('edit.text', $text->id) }}" class="btn btn-info btn-sm"><i class="si si-note"></i></a>
                                                    <a href="{{ route('delete.text', $text->id) }}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm"><i class="si si-trash"></i></a>
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
