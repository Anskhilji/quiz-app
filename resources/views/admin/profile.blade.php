@extends('student.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-full">

            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-12 col-lg-12 col-xl-12">

                        <div class="box box-inverse bg-img" style="background-image: url({{ asset('images/gallery/full/1.jpg') }});" data-overlay="2">
                            <div class="flexbox px-20 pt-20">
                                <label class="toggler toggler-danger text-white">
                                    <input type="checkbox">
                                    <i class="fa fa-heart"></i>
                                </label>
                                <div class="dropdown">
                                    <a data-toggle="dropdown" href="#"><i class="ti-more-alt rotate-90 text-white"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-picture-o"></i> Shots</a>
                                        <a class="dropdown-item" href="#"><i class="ti-check"></i> Follow</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fa fa-ban"></i> Block</a>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body text-center pb-50">
                                <a href="#">
                                    <img class="avatar avatar-xxl avatar-bordered" src="../images/avatar/5.jpg" alt="">
                                </a>
                                <h4 class="mt-2 mb-0"><a class="hover-primary text-white" href="#">{{ auth()->user()->name }}</a></h4>
                                <span><i class="fa fa-map-marker w-20"></i> Miami</span>
                            </div>

                            <ul class="box-body flexbox flex-justified text-center" data-overlay="4">
                                <li>
                                    <span class="opacity-60">Followers</span><br>
                                    <span class="font-size-20">8.6K</span>
                                </li>
                                <li>
                                    <span class="opacity-60">Following</span><br>
                                    <span class="font-size-20">8457</span>
                                </li>
                                <li>
                                    <span class="opacity-60">Tweets</span><br>
                                    <span class="font-size-20">2154</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Profile Image -->
                        <div class="box">
                            <div class="box-body box-profile">
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <p>Email :<span class="text-gray pl-10">David@yahoo.com</span> </p>
                                            <p>Phone :<span class="text-gray pl-10">+11 123 456 7890</span></p>
                                            <p>Address :<span class="text-gray pl-10">123, Lorem Ipsum, Florida, USA</span></p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="pb-15">
                                            <p class="mb-10">Social Profile</p>
                                            <div class="user-social-acount">
                                                <button class="btn btn-circle btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></button>
                                                <button class="btn btn-circle btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></button>
                                                <button class="btn btn-circle btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div>
                                            <div class="map-box">
                                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2805244.1745767146!2d-86.32675167439648!3d29.383165774894163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88c1766591562abf%3A0xf72e13d35bc74ed0!2sFlorida%2C+USA!5e0!3m2!1sen!2sin!4v1501665415329" width="100%" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <!-- /.box -->
                    </div>
                </div>
                <!-- /.row -->

            </section>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->







@endsection
