@extends('teacher.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">

                    <div class="col-12">
                        <form action="{{ route('create.quiz') }}" method="post">
                            @csrf
                            <input type="hidden" name="subject_id" value="{{ Request::segment('5') }}">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Choose Questions</h3>
                            </div>
                            <div class="row m-0 d-flex justify-content-between">
                                <div class="col-md-3">
                                    <label for="#msqstotal">Quiz Date</label>
                                    <input class="form-control" type="date" name="date" value="{{ old('date') }}">
                                    <span class="text-danger">@error('date'){{ $message }}@enderror</span>
                                </div>
                                <div class="col-md-2">
                                    <label for="#msqstotal">Quiz Start Time</label>
                                    <input class="form-control" type="time" name="start_time" value="{{ old('date') }}">
                                    <span class="text-danger">@error('start_time'){{ $message }}@enderror</span>
                                </div>
                                <div class="col-md-2">
                                    <label for="#msqstotal">Quiz End Time</label>
                                    <input class="form-control" type="time" name="end_time" value="{{ old('date') }}">
                                    <span class="text-danger">@error('end_time'){{ $message }}@enderror</span>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <input class="btn btn-info form-control" type="submit">
                                </div>
                            </div>
                            <!-- /.box-header -->
                                <div class="ml-4 p-0 pr-4">
                                    <h3>Mcq's</h3>
                                </div>
                            @php
                                $select_old_m = (old('select_m') !== null) ? old('select_m') : array();
                                $select_old_t = (old('select_t') !== null) ? old('select_t') : array();
                            @endphp
                                <div class="box-body pt-0">
                                    <span class="text-danger">@error('select_m'){{ $message }}@enderror</span>
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th width="10%">Select Q</th>
                                                <th width="10%">ID</th>
                                                <th>Question</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($i=1)

                                           @foreach($mcsqs as $key => $m)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="select_m[]" value="{{$m->id}}" {{ in_array($m->id,$select_old_m) ? 'checked' : '' }} id="basic_checkbox_{{$key}}">
                                                    <label for="basic_checkbox_{{$key}}"></label>
                                                </td>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $m->question }}</td>
                                            </tr>
                                           @endforeach
                                        </table>
                                    </div>
                                </div>
                            <!-- /.box-body -->
                        </div>

                            <div class="box">
                            <!-- /.box-header -->
                                <div class="ml-4 p-0">
                                    <h3>Subjective</h3>
                                    <span class="text-danger">@error('select_t'){{ $message }}@enderror</span>
                                </div>
                                <div class="box-body pt-0">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th width="10%">Select Q</th>
                                                <th width="10%">ID</th>
                                                <th>Question</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($i=1)
                                            @foreach($subjective as $key => $sub)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" id="basic_checkbox2_{{$key}}" name="select_t[]"  value="{{$sub->id}}" {{ in_array($sub->id,$select_old_t) ? 'checked' : '' }} data-marks="{{$sub->sub_marks}}">
                                                    <label for="basic_checkbox2_{{ $key }}"></label>
                                                </td>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $sub->question }}</td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            <!-- /.box-body -->
                        </div>
                        </form>

                    </div>
                </div>
            </section>
            <!-- /.content -->

        </div>
    </div>
    <!-- /.content-wrapper -->



@endsection
