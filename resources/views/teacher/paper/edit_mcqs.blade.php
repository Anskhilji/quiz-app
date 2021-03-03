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
                            <form class="form" action="{{ route('update.mcqs', $mcqs->id) }}" method="post">
                                @csrf
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Choose Subject<span class="text-danger">*</span></label>
                                                <select class="form-control" name="subject_id">
                                                    <option value="" selected disabled>Choose an option</option>
                                                    @foreach($subjects as $subject)
                                                        <option value="{{$subject->id}}" {{ $subject->id == $mcqs->subject_id ? "selected" : "" }}>{{ $subject->subject_name }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="text-danger">@error('subject_id'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Question<span class="text-danger">*</span></label>
                                                <input type="text" name="question" value="{{ $mcqs->question }}" class="form-control" placeholder="Question">
                                                <span class="text-danger">@error('question'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Question Type<span class="text-danger">*</span></label>
                                                <select class="form-control change_input" name="question_type">
                                                    <option value="" selected disabled>Choose an option</option>
                                                    <option value="m" {{ $mcqs->question_type == "m" ? "selected" : "" }}>MCQ</option>
                                                </select>
                                                <span class="text-danger">@error('question_type'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 form__row hidden">
                                            <div class="form-group form__input--cadence">
                                                <label >Option 1</label>
                                                <input type="text" value="{{ $mcqs->option_1 }}" name="option_1" class="form-control" placeholder="Option 1">
                                                <span class="text-danger">@error('option_1'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form__row hidden">
                                            <div class="form-group form__input--cadence">
                                                <label>Option 2</label>
                                                <input type="text" value="{{ $mcqs->option_2 }}" name="option_2" class="form-control" placeholder="Option 2">
                                                <span class="text-danger">@error('option_2'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form__row hidden">
                                            <div class="form-group form__input--cadence">
                                                <label>Option 3</label>
                                                <input type="text" value="{{ $mcqs->option_3 }}" name="option_3" class="form-control" placeholder="Option 3">
                                                <span class="text-danger">@error('option_3'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form__row hidden">
                                            <div class="form-group form__input--cadence">
                                                <label >Option 4</label>
                                                <input type="text" value="{{ $mcqs->option_4 }}" name="option_4" class="form-control" placeholder="Option 4">
                                                <span class="text-danger">@error('option_4'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-3 form__row hidden">
                                            <div class="form-group form__input--cadence">
                                                <label >Correct</label>
                                                <input type="text" value="{{ $mcqs->correct }}" name="correct" class="form-control" placeholder="Option 4">
                                                <span class="text-danger">@error('correct'){{$message}}@enderror</span>
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
