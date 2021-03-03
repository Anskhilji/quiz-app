<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="index.html">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('images/logo-dark.png') }}" alt="">
                        <h3><b>Teacher</b>{{ auth()->guard('teacher')->user()->name }}</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->is('teacher/dashboard') ? 'active' : '' }}">
                <a href="{{ route('teacher.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ request()->is('teacher/subjects') ? 'active' : '' }}">
                <a href="{{ route('teacher.subject') }}">
                    <i data-feather="book-open"></i>
                    <span>All Subjects</span>
                </a>
            </li>

            <li class="treeview {{ request()->is('teacher/add/question') ? 'menu-open' : '' }}">
                <a href="#">
                    <i data-feather="map"></i>
                    <span>Create Paper</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('teacher/add/question') ? 'active' : '' }}"><a href="{{ route('teacher.add.question') }}"><i class="ti-more"></i>Add Question</a></li>
                    <li class="{{ request()->is('teacher/all/question') ? 'active' : '' }}{{ request()->is('teacher/edit/question*') ? 'active' : '' }}"><a href="{{ route('teacher.all.question') }}"><i class="ti-more"></i>All Question</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('teacher/subject/request') ? 'menu-open' : '' }}">
                <a href="#">
                    <i data-feather="arrow-down-circle"></i>
                    <span>Subject Request</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('teacher/subject/request') ? 'active' : '' }}"><a href="{{ route('teacher.all.request') }}"><i class="ti-more"></i>All Request</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('teacher/exam*') ? 'menu-open' : '' }}">
                <a href="#">
                    <i data-feather="" style="font-size: 19px" class="si si-note"></i>
                    <span>View Exams</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('teacher/exam/attempted*') ? 'active' : '' }}"><a href="{{ route('teacher.exam.attempted') }}"><i class="ti-more"></i>Attempted</a></li>
                    <li class="{{ request()->is('teacher/exam/marked*') ? 'active' : '' }}"><a href="{{ route('teacher.exam.marked') }}"><i class="ti-more"></i>Marked Paper</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('teacher/edit/profile') ? 'menu-open' : '' }}">
                <a href="#">
                    <i data-feather="settings" style="font-size: 19px" class="si si-settings"></i>
                    <span>Setting</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('teacher/edit/profile') ? 'active' : '' }}"><a href="{{ route('teacher.edit.profile') }}"><i class="ti-more"></i>Edit Profile</a></li>
                    <li class="{{ request()->is('teacher/change/password') ? 'active' : '' }}"><a href="{{ route('teacher.change.password') }}"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>

        </ul>
    </section>

</aside>
