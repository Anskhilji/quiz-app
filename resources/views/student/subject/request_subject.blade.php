@extends('student.layouts.app')
<style>
    .hidden{
        display: none;
    }
</style>
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Choose Subject</h4>
                            </div>
                            <form class="form" action="{{ route('store.subrequest') }}" method="post">
                                @csrf
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Choose Subject<span class="text-danger">*</span></label>
                                                <select class="form-control" name="subject_id">
                                                    <option value="" selected disabled>Choose an option</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{$subject->id}}">{{ $subject->subject_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('subject_id'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class="ti-save-alt"></i> Send Request
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->

@endsection
