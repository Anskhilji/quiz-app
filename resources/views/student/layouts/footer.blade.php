<footer class="main-footer">
    &copy; <a href="https://dgaps.com/" target="_blank">{{ date('Y') }} Powered by Digital Applications</a>.
</footer>

<!-- Control Sidebar -->
<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<!-- Vendor JS -->
<script src="{{ asset('js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
@if(Request::segment(1) == "view" && Request::segment(2) == "result")
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-table.js') }}"></script>
@endif

@if(Request::segment(2) == "papers" && Request::segment(3) == "list")
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('js/pages/data-table.js') }}"></script>
@endif
<!-- Sunny Admin App -->
<script src="{{ asset('js/template.js') }}"></script>
{{--<script src="{{ asset('js/pages/dashboard.js') }}"></script>--}}


<script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
<script src="{{ asset('js/pages/toastr.js') }}"></script>
<script src="{{ asset('js/pages/notification.js') }}"></script>
<script src="{{asset('sweet_alert/alert.js')}}"></script>
<link rel="stylesheet" href="{{ asset('sweet_alert/sweet.min.css') }}">
<script>
    $('.sw2').click(function (e){
        var Url = $(this).attr('href');
        e.preventDefault();
        Swal.fire({
            title: 'Do you want to Start the Quiz?',
            showCancelButton: true,
            confirmButtonText: `Start`,
        }).then((result) => {
            if (result.isConfirmed) { location.href = Url;}
        })
    })
</script>
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
</body>
</html>
