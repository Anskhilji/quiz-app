<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">

    <title>Quiz - Log in </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">

</head>
<body class="hold-transition theme-primary bg-gradient-primary">

<div class="container h-p100">
    <div class="row align-items-center justify-content-md-center h-p100">

        <div class="col-12">
            <div class="row justify-content-center no-gutters">
                <div class="col-lg-4 col-md-5 col-12">
                    <div class="content-top-agile p-10">
                        <h2 class="text-white">Get started with Us</h2>
                        <p class="text-white-50">Sign in to start your session</p>
                    </div>
                    <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
                        <form action="{{ route('teacher.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Enter your email">
                                </div>
                                <span class="text-danger">@error('email'){{ $message }}@enderror</span>

                            </div>
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Enter your Password">
                                </div>
                                <span class="text-danger">@error('password'){{ $message }}@enderror</span>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="checkbox text-white">
                                        <input type="checkbox" name="remember"  id="basic_checkbox_1" >
                                        <label for="basic_checkbox_1">Remember Me</label>
                                    </div>
                                </div>
                                <!-- /.col -->
{{--                                <div class="col-6">--}}
{{--                                    <div class="fog-pwd text-right">--}}
{{--                                        <a href="javascript:void(0)" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot pwd?</a><br>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <!-- /.col -->
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Vendor JS -->
<script src="{{ asset('js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

</body><script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
<script src="{{ asset('js/pages/toastr.js') }}"></script>
<script src="{{ asset('js/pages/notification.js') }}"></script>
<script>
    @if (Session::has('message'))
    let type = "{{ Session::get('alert-type','info') }}";
    switch (type) {
        case "info":
            $.toast({
                heading: '{{ Session::get('message') }}',
                text: '',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 4000,
                stack: 6
            });
            break;

        case "success":
            $.toast({
                heading: '{{ Session::get('message') }}',
                text: '',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 4000,
                stack: 6
            });
            break;

        case "error":
            $.toast({
                heading: '{{ Session::get('message') }}',
                text: '',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'error',
                hideAfter: 4000

            });
            break;

        case "warning":
            $.toast({
                heading: '{{ Session::get('message') }}',
                text: '',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'warning',
                hideAfter: 4000,
                stack: 6
            });
            break;
    }
    @endif
</script>
</html>
