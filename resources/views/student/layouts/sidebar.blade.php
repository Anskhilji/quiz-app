<!-- Left side column. contains the logo and sidebar -->
@php
    $requests_sub = DB::table('requests')
                    ->join('users','requests.user_id','users.id')
                    ->join('subjects', 'requests.subject_id','subjects.id')
                    ->select('requests.*','users.name','subjects.subject_name')
                    ->where('requests.status',1)->where('requests.user_id',auth()->id())
                    ->get();
@endphp
{{--@php--}}
{{--    $requests_sub = DB::table('attempts')--}}
{{--    ->join('subjects','attempts.subject_id','subjects.id')--}}
{{--    ->select('attempts.*','subjects.id as sub_id')--}}
{{--    ->where('attempts.user_id', auth()->id())->where('attempts.subject_id', 1)--}}
{{--    ->first();--}}
{{--        dd($requests_sub);--}}
{{--@endphp--}}

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/logo-dark.png') }}" alt="">
                        <h3><b>Student</b> {{ Auth::user()->name }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->is('dashboard') ? "active" : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ request()->is('choose/subject') ? 'menu-open' : '' }}">
                <a href="#">
                    <i data-feather="book-open"></i>
                    <span>Subjects</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('choose/subject') ? 'active' : '' }}"><a href="{{ route('choose.subject') }}"><i class="ti-more"></i>Choose Subject</a></li>
                </ul>
            </li>

{{--            @if(Request::segment(2) == "subject" && Request::segment(3) == "all")--}}
{{--                <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>--}}
{{--                <script src="{{ asset('js/pages/data-table.js') }}"></script>--}}
{{--            @endif--}}
         @if($requests_sub->count() > 0)
                <li class="treeview {{ ( request()->segment(1) == 'view' && request()->segment(2) == 'paper') ? 'menu-open active' : '' }}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Papers</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        @if($requests_sub->count() > 0)
                            @foreach($requests_sub as $req)
                                <li  class="{{ (request()->segment(1) == 'view' && request()->segment(2) == 'paper' && request()->segment(3) == $req->subject_id) ? ' active' : '' }} ">
                                    <a class="sw2"   href="{{ route('view.paper',$req->subject_id) }}">
                                        <i class="ti-more"></i>{{ $req->subject_name }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </li>

            @endif

            <li class="treeview {{ request()->is('view/result') ? 'menu-open' : '' }}">
                <a href="#">
                    <i style="font-size: 19px" class="si si-layers"></i>
                    <span>Result</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('view/result') ? 'active' : '' }}"><a href="{{ route('student.view.result') }}"><i class="ti-more"></i>View Result</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('edit/profile') ? 'menu-open' : '' }}">
                <a href="#">
                    <i style="font-size: 19px" class="si si-settings"></i>
                    <span>Setting</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('edit/profile') ? 'active' : '' }}"><a href="{{ route('student.edit.profile') }}"><i class="ti-more"></i>Edit Profile</a></li>
                    <li class="{{ request()->is('change/password') ? 'active' : '' }}" ><a href="{{ route('student.change.password') }}"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>
        </ul>
    </section>

</aside>