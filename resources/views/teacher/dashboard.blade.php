@extends('teacher.layouts.app')

@section('content')
@php
    $subjects = \App\Models\Subject::where('teacher_id', auth()->guard('teacher')->id())->get();
@endphp
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xl-2 col-6">
                        <div class="box overflow-hidden pull-up">
                            <div class="box-body">
                                <div class="icon bg-primary-light rounded w-60 h-60">
                                    <i class="text-primary mr-0 font-size-24 mdi mdi-book-open-variant"></i>
                                </div>
                                <div>
                                    <p class="text-mute mt-20 mb-0 font-size-16">Assigned Subjects</p>
                                    <h3 class="text-white mb-0 font-weight-500">{{ $subjects->count() }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->

@endsection
