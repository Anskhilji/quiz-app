@extends('student.layouts.app')

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
                                <h3 class="box-title">All Quiz</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table  class="table table-bordered table-striped example1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Teacher Name</th>
                                            <th>Subject</th>
                                            <th>Quiz Date</th>
                                            <th>Quiz Start In</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <script>
                                            function setTimer(el, time_c) {
                                                var labelTimer = document.querySelector(el)  ?? "";
                                                var startSubmitFormTimer = function () {
                                                    var tick = function () {
                                                        var min = String(Math.trunc(time/60)).padStart(2,0);
                                                        var sec = String(time % 60).padStart(2,0);
                                                        labelTimer.textContent =  `${min}:${sec}`;
                                                        if (time === 0){
                                                            clearInterval(timer);
                                                            location.reload();
                                                        }
                                                        time--;
                                                    }
                                                    var time = parseInt(time_c);
                                                    tick();
                                                    var timer = setInterval(tick,1000);
                                                }
                                                startSubmitFormTimer();
                                            }
                                        </script>
                                        <tbody>
                                        @if(count($multiplied) > 0)
                                            <?php $count = 0; ?>
                                        @foreach($multiplied as $attempt)
                                            @foreach($attempt as $key => $value)
                                                <?php
                                                    $sub_detail = get_subject_name($value->subject_id);
                                                    $tec_detail = get_teacher_name($value->teacher_id);
                                                ?>
                                                <tr>
                                                    <td>{{ ++$count }}</td>
                                                    <td>{{$tec_detail}}</td>
                                                    <td>{{$sub_detail}}</td>
                                                    <td>
                                                        {{$value->date}}
                                                        <?php
                                                        $date = $value->date;
                                                        $start_time = strtotime($date." ".$value->start_time);
                                                        $end_time = strtotime($date." ".$value->end_time);
                                                        $time = $start_time - time();

                                                        $paper_type = get_paper_status($value->id);
                                                        ?>
                                                    </td>
                                                    <td>
                                                        @if(time() > $end_time)
                                                            @if($paper_type != "false")
                                                                Attempted
                                                            @else
                                                                ---------
                                                            @endif
                                                        @elseif(time() >=$start_time)
                                                            @if($paper_type != "false")
                                                                Attempted
                                                            @else
                                                                Started---
                                                            @endif
                                                        @else
                                                            <div class="center">Time:
                                                                <span id="time" class="timer{{$count}}" style="font-size: 13px !important;" ></span> minutes!
                                                            </div>
                                                            <script>
                                                                setTimer('.timer{{$count}}',"{{$time}}")
                                                            </script>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($paper_type!="false")
                                                            <a href="#" class="btn btn-sm btn-primary">{{$paper_type}}</a>
                                                        @elseif(time() > $end_time)
                                                            <a disabled class="btn btn-sm btn-info">Ended</a>
                                                        @elseif(time() >= $start_time)
                                                            <a href="{{ route('view.paper',$value->id) }}" class="btn btn-sm btn-success">Start</a>
                                                        @else
                                                            <a disabled class="btn btn-sm btn-info">Up comming</a>
                                                        @endif

                                                    </td>
                                                </tr>
                                                @endforeach
                                        @endforeach
                                        @endif
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
