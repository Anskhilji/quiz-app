@extends('teacher.layouts.app')
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
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h4 class="box-title">Question paper</h4>
                                <a href="{{ route('teacher.all.question') }}" class="btn btn-info pull-right">View Question</a>
                            </div>
                            <form class="form" action="{{ route('teacher.store.question') }}" method="post">
                                @csrf
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label >Question<span class="text-danger">*</span></label>
                                                <input type="text" name="question" class="form-control" placeholder="Question">
                                                <span class="text-danger">@error('question'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Question Type<span class="text-danger">*</span></label>
                                                <select class="form-control change_input" name="question_type">
                                                    <option value="" selected disabled>Choose an option</option>
                                                        <option value="m">MCQ's</option>
                                                        <option value="t">Subjective</option>
                                                </select>
                                                <span class="text-danger">@error('question_type'){{$message}}@enderror</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                           <div class="col-md-3 form__row hidden">
                                               <div class="form-group form__input--cadence">
                                                   <label >Option 1</label>
                                                   <input type="text" name="option_1" class="form-control" placeholder="Option 1">
                                                   <span class="text-danger">@error('option_1'){{$message}}@enderror</span>
                                               </div>
                                           </div>
                                           <div class="col-md-3 form__row hidden">
                                               <div class="form-group form__input--cadence">
                                                   <label>Option 2</label>
                                                   <input type="text" name="option_2" class="form-control" placeholder="Option 2">
                                                   <span class="text-danger">@error('option_2'){{$message}}@enderror</span>
                                               </div>
                                           </div>
                                           <div class="col-md-3 form__row hidden">
                                               <div class="form-group form__input--cadence">
                                                   <label>Option 3</label>
                                                   <input type="text" name="option_3" class="form-control" placeholder="Option 3">
                                                   <span class="text-danger">@error('option_3'){{$message}}@enderror</span>
                                               </div>
                                           </div>
                                           <div class="col-md-3 form__row hidden">
                                               <div class="form-group form__input--cadence">
                                                   <label >Option 4</label>
                                                   <input type="text" name="option_4" class="form-control" placeholder="Option 4">
                                                   <span class="text-danger">@error('option_4'){{$message}}@enderror</span>
                                               </div>
                                           </div>
                                        <div class="col-md-3 form__row hidden">
                                               <div class="form-group form__input--cadence">
                                                   <label >Correct</label>
                                                   <input type="text" name="correct" class="form-control" placeholder="Correct">
                                                   <span class="text-danger">@error('correct'){{$message}}@enderror</span>
                                               </div>
                                           </div>
                                    </div>
                                    <div class="form-group form__row hidden">
                                        <label>Answer:</label>
                                        <textarea class="form-control form__input--elevation" name="text" rows="3" placeholder="Enter ..."></textarea>
                                        <div>
                                            <label>Marks:</label>
                                            <input type="text" class="form-control form__input--elevation" name="text_marks" placeholder="Enter Marks">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-rounded btn-primary btn-outline stop-reload">
                                        <i class="ti-save-alt"></i> Save
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

    <script>
        let select = document.querySelector('.change_input');
        let textInput = document.querySelectorAll('.form__input--cadence');
        let radioInput = document.querySelector('.form__input--elevation');
        select.addEventListener('change', function (e){
            console.log('change');
            if (e.target.value == 'm')  {
                textInput.forEach(e=> e.closest('.form__row').classList.remove('hidden'));
                radioInput.closest('.form__row').classList.add('hidden');
            }
            if (e.target.value == 't')  {
                radioInput.closest('.form__row').classList.remove('hidden');
                textInput.forEach(e=> e.closest('.form__row').classList.add('hidden'))

            }

        });
    </script>
@endsection
