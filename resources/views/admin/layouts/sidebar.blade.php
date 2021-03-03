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
                        <h3><b>Admin</b> {{auth()->guard('admin')->user()->name}}</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="treeview {{ request()->is('admin/teacher*') ? 'menu-open' : '' }}">
                <a href="#">
                    <i class="si si-people" style="font-size: 19px"></i>
                    <span>Teachers</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('admin/teacher/add') ? 'active' : '' }}"><a href="{{ route('add.teacher') }}"><i class="ti-more"></i>Add Teacher</a></li>
                    <li class="{{ request()->is('admin/teacher/all') ? 'active' : '' }} {{ request()->is('admin/teacher/edit*') ? 'active' : '' }}"><a href="{{ route('all.teacher') }}"><i class="ti-more"></i>All Teachers</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('admin/subject*') ? 'menu-open' : '' }}">
                <a href="#">
                    <i data-feather="book-open"></i>
                    <span>Subjects</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('admin/subject/add') ? 'active' : '' }}"><a href="{{ route('add.subject') }}"><i class="ti-more"></i>Add subject</a></li>
                    <li class="{{ request()->is('admin/subject/all') ? 'active' : '' }} {{ request()->is('admin/subject/edit*') ? 'active' : '' }}"><a href="{{ route('all.subject') }}"><i class="ti-more"></i>All Subject</a></li>
                </ul>
            </li>

            <li class="treeview {{ request()->is('admin/update*') ? 'menu-open' : '' }}">
                <a href="#">
                    <i style="font-size: 19px" class="si si-settings"></i>
                    <span>Setting</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->is('admin/edit/profile') ? 'active' : '' }}"><a href="{{ route('edit.profile') }}"><i class="ti-more"></i>Update Profile</a></li>
                    <li class="{{ request()->is('admin/change/password') ? 'active' : '' }}"><a href="{{ route('change.password') }}"><i class="ti-more"></i>Change Password</a></li>
                </ul>
            </li>
        </ul>
    </section>

</aside>
