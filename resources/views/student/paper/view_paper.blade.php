@extends('student.layouts.app')
<style>
.hidden {
    display: none;
}
.timer{
    font-size: 1.2rem !important;
}
.center{
    margin-top: 10px;
    text-align: center;

}
</style>
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Main content -->
            <section class="content">
                @if($status == 'notattempted')
                <div class="row">
                        <div class="box">
                            <div class="center">Time: <span id="time" class="timer"></span> minutes!</div>
                            @php($i =1)
                            <form action="" name="TimerForm" id="TimerForm" class="auto_submit" method="post" >
                                @csrf
                                @foreach($papers as $paper)
                                        <div style="margin-left: 20px; margin-top: 10px">
                                            <span>Q,{{ $i++ }}</span>
                                            <h4 class="box-title">{{ $paper->question }}</h4>
                                        </div>
                                    <input type="hidden" name="teacher_id" value="{{$paper->teacher_id}}">
                                    <input type="hidden" name="subject_id" value="{{$paper->subject_id}}">
                                    <input type="hidden" name="q[]" value="{{$paper->id}}">
                                    <input type="hidden" name="q{{$paper->id}}-type" value="{{ $paper->question_type }}">
                                    <div class="box-body ">
                                        <div class="radio">
                                            <input name="q{{$paper->id}}-option"  value="{{$paper->option_1}}"  type="radio" id="q{{$paper->id}}-optionA">
                                            A) &nbsp;<label for="q{{$paper->id}}-optionA">{{ $paper->option_1 }}</label>
                                        </div>

                                        <div class="radio">
                                            <input name="q{{$paper->id}}-option" type="radio" value="{{$paper->option_2}}" id="q{{$paper->id}}-optionB">
                                            B) &nbsp;<label for="q{{$paper->id}}-optionB">{{ $paper->option_2 }}</label>
                                        </div>

                                        <div class="radio">
                                            <input name="q{{$paper->id}}-option" type="radio"  value="{{$paper->option_3}}" id="q{{$paper->id}}-optionC">
                                            C) &nbsp;<label for="q{{$paper->id}}-optionC">{{ $paper->option_3 }}</label>
                                        </div>

                                        <div class="radio">
                                            <input name="q{{$paper->id}}-option" type="radio" value="{{$paper->option_4}}" id="q{{$paper->id}}-optionD">
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
                                    <div class="form-group mr-4 ml-4">
{{--                                        <label>Textarea</label>--}}
                                        <textarea name="t{{$text->id}}-ans" rows="5" cols="5" class="form-control" placeholder=""></textarea>
                                    </div>
                                @endforeach
                                    <button type="submit" id="t"  name="submit" class="btn btn-rounded btn-info pull-right">Submit</button>

                            </form>
                        </div>

                    </div>
                @else
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h3>Attempted!</h3>
                        </div>
                    </div>
                @endif
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
    <script>
            @if($status == 'notattempted')
            let labelTimer = document.querySelector('.timer')  ?? "";
            const startSubmitFormTimer = function () {
                const tick = function () {
                    const min = String(Math.trunc(time/60)).padStart(2,0);
                    const sec = String(time % 60).padStart(2,0);
                    labelTimer.textContent =  `${min}:${sec}`;
                    if (time === 0){
                        clearInterval(timer);
                        document.TimerForm.submit.click();
                    }
                    time--;
                }
                let time = 1800;
                tick();
                const timer = setInterval(tick,1000);
            }
            startSubmitFormTimer();
        @endif
    </script>

@endsection
