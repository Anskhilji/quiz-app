@extends('teacher.layouts.app')


@section('content')
    <style>
        [type="radio"]:disabled + label {
            color: #8a99b5 !important;
        }
    </style>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <?php
            $answer = (!empty($attempted) and !empty($attempted->text_ans)) ? json_decode($attempted->text_ans , true) : array();
            $collection = collect($answer);
            //            dd($answer);
            ?>
            <section class="content">
                <div class="row">
                    <div class="box">
                        @php($i =1)
                        @foreach($papers as $paper)
                            <div style="margin-left: 20px; margin-top: 10px">
                                <span>Q,{{ $i++ }}</span>
                                <h4 class="box-title">{{ $paper->question }}</h4>
                            </div>
                            <?php
                            $result = $collection->where('id',$paper->id)->where('type','m')->first();
                            $ans_status = correct_ans($paper->id);
                            //                            dd($paper->)
                            ?>
                            <input type="hidden" name="teacher_id" value="{{$paper->teacher_id}}">
                            <input type="hidden" name="subject_id" value="{{$paper->subject_id}}">
                            <input type="hidden" name="q[]" value="{{$paper->id}}">
                            <input type="hidden" name="q{{$paper->id}}-type" value="{{ $paper->question_type }}">
                            <div class="box-body ">
                                <div class="radio">
                                    <input name="q{{$paper->id}}-option"   disabled type="radio" id="q{{$paper->id}}-optionA" {{ (!empty($result) and $result['select'] == $paper->option_1) ? 'checked' : "" }}  data-answer ="{{ ($ans_status == $paper->option_1) ? "correct":"incorrect" }}">
                                    A) &nbsp;<label for="q{{$paper->id}}-optionA">{{ $paper->option_1 }}</label>
                                </div>

                                <div class="radio">
                                    <input name="q{{$paper->id}}-option" type="radio" disabled  id="q{{$paper->id}}-optionB" {{ (!empty($result) and $result['select'] == $paper->option_2) ? 'checked' : "" }}  data-answer ="{{ ($ans_status == $paper->option_2) ? "correct":"incorrect" }}">
                                    B) &nbsp;<label for="q{{$paper->id}}-optionB">{{ $paper->option_2 }}</label>
                                </div>

                                <div class="radio">
                                    <input name="q{{$paper->id}}-option" type="radio" disabled  id="q{{$paper->id}}-optionC" {{ (!empty($result) and $result['select'] == $paper->option_3) ? 'checked' : "" }} data-answer ="{{ ($ans_status == $paper->option_3) ? "correct":"incorrect" }}">
                                    C) &nbsp;<label for="q{{$paper->id}}-optionC">{{ $paper->option_3 }}</label>
                                </div>

                                <div class="radio">
                                    <input name="q{{$paper->id}}-option" type="radio" disabled  id="q{{$paper->id}}-optionD" {{ (!empty($result) and $result['select'] == $paper->option_4) ? 'checked' : "" }} data-answer ="{{ ($ans_status == $paper->option_4) ? "correct":"incorrect" }}">
                                    D) &nbsp;<label for="q{{$paper->id}}-optionD">{{ $paper->option_4 }}</label>
                                </div>
                            </div>
                        @endforeach
                        @foreach($texts as $text)
                            <input type="hidden" name="teacher_id" value="{{$text->teacher_id}}">
                            <input type="hidden" name="subject_id" value="{{$text->subject_id}}">
                            <input type="hidden" name="t{{$text->id}}-type" value="{{ $text->question_type }}">
                            <div style="margin-left: 20px; margin-top: 10px">
                                <span>Q,{{ $i++ }}</span>
                                <h4 class="box-title">{{ $text->question }}</h4>
                                <input type="hidden" name="t[]" value="{{$text->id}}">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Obtaining Marks</label>
                                        <input type="number" class="form-control obtained_total">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="">Total Marks</label>
                                        <input type="number" class="form-control subjective_total">
                                    </div>
                                </div>
                                <div class="form-group col-6 mr-4 ml-4" style="box-sizing: border-box">
                                    <label>Textarea</label>
                                    <?php
                                    $result = $collection->where('id',$text->id)->where('type','t')->first();
                                    //                                dd($result);
                                    ?>
                                    <textarea name="t{{$text->id}}-ans" rows="5" cols="5" disabled class="form-control" placeholder="Textarea">{{ (!empty($result)) ? $result['ans'] : ""}}</textarea>
                                </div>

                                <div class="form-group col-5 mr-4" style="box-sizing: border-box">
                                    <label>Correct!</label>
                                    <?php
                                    $result = $collection->where('id',$text->id)->where('type','t')->first();
                                    // dd($result);
                                    ?>
                                    <textarea name="t{{$text->id}}-ans" rows="5" cols="5" disabled class="form-control" placeholder="Textarea">{{ $text->text}}</textarea>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="row">
                    <div class="box">
                        @php($i =1)
                        <form action="{{ route('store.marks.update', $id) }}" method="post" >
                            @csrf
                            <h4 class="ml-4 mt-4">Objective Marks</h4>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Total Mcsq Marks</label>
                                    <input type="text" readonly name="obj_total" value="{{ count($papers) }}" class="form-control" placeholder="Text input">
                                    <span class="text-danger">@error('obj_total'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>Obtained Mcsq Marks</label>
                                    <input type="text" readonly name="obj_abtained" value="" class="form-control obt_mcqs" placeholder="Text input">
                                    <span class="text-danger">@error('obj_abtained'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <h4 class="ml-4 mt-4">Subjective Marks</h4>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>Subjective Total Marks</label>
                                    <input type="text" name="sbj_total" readonly class="form-control sub_t" placeholder="Text input">
                                    <span class="text-danger">@error('sbj_total'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>Obtained Total Marks</label>
                                    <input type="text" name="sbj_obtained" readonly class="form-control obtained_get_total" placeholder="Text input">
                                    <span class="text-danger">@error('sbj_obtained'){{ $message }}@enderror</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Edit Result" class="btn btn-primary ml-4">
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
