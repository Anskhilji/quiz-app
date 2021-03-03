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
                                <h4 class="box-title">Question Update</h4>
                                <a href="{{ route('teacher.all.question') }}" class="btn btn-info pull-right">View Question</a>
                            </div>
                            <form class="form" action="{{ route('update.text', $texts->id) }}" method="post">
                                @csrf
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Choose Subject<span class="text-danger">*</span></label>
                                                <select class="form-control" name="subject_id">
                                                    <option value="" selected disabled>Choose an option</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{$subject->id}}" {{ $subject->id == $texts->subject_id ? "selected" : "" }}>{{ $subject->subject_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('subject_id'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Question<span class="text-danger">*</span></label>
                                                <input type="text" name="question" value="{{ $texts->question }}" class="form-control" placeholder="Question">
                                                <span class="text-danger">@error('question'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Question Type<span class="text-danger">*</span></label>
                                                <select class="form-control change_input" name="question_type">
                                                    <option value="" selected disabled>Choose an option</option>
                                                    <option value="t" {{ $texts->question_type == "t" ? "selected" : "" }}>Text</option>
                                                </select>
                                                <span class="text-danger">@error('question_type'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Textarea</label>
                                                <textarea class="form-control form__input--elevation" name="text" rows="3" placeholder="Enter ...">{{ $texts->text }}</textarea>
                                                <span class="text-danger">@error('text'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline">
                                        <i class=" ti-pencil-alt2"></i> Update
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
