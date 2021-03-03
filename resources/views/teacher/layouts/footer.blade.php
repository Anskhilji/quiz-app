<footer class="main-footer">
    &copy; <a href="https://dgaps.com/" target="_blank">{{ date('Y') }} Powered by Digital Applications</a>.
</footer>

</div>
<!-- ./wrapper -->

<!-- Vendor JS -->
<script src="{{ asset('js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

@if(Request::segment(2) == "teacher" && Request::segment(3) == "all")
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/data-table.js') }}"></script>
@endif

@if(Request::segment(2) == "subject" && Request::segment(3) == "all")
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/data-table.js') }}"></script>
@endif

@if(Request::segment(2) == "exam" && Request::segment(3) == "attempted")
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/data-table.js') }}"></script>
@endif

@if(Request::segment(2) == "all" && Request::segment(3) == "question")
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/data-table.js') }}"></script>
@endif

@if(Request::segment(2) == "subject" && Request::segment(3) == "request")
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/data-table.js') }}"></script>
@endif

@if(Request::segment(2) == "exam" && Request::segment(3) == "marked")
<script src="{{ asset('assets/vendor_components/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('js/pages/data-table.js') }}"></script>
@endif

@if(Request::segment(3) == "attempted" && Request::segment(4) == "view")
    <script>
        $(document).ready(function (){
            var correct = $('input[data-answer="correct"]:checked');
            // console.log(correct);
            $('.obt_mcqs').val(correct.length);

            $('.subjective_total').on('change', function () {
                var sub_total = $(this).val();
                // console.log(sub_val);
                let grand_total = $('.sub_t').val();
                $('.sub_t').val(parseInt(+sub_total) + parseInt(+grand_total));
            })

            $('.obtained_total').on('change', function () {
                var obt_total = $(this).val();
                // console.log(sub_val);
                let grand_obt_total = $('.obtained_get_total').val();
                $('.obtained_get_total').val(parseInt(+obt_total) + parseInt(+grand_obt_total));
            })

        })
    </script>
@endif

@if(Request::segment(3) == "marked" && Request::segment(4) == "view")
    <script>
        $(document).ready(function (){
            var correct = $('input[data-answer="correct"]:checked');
            // console.log(correct);
            $('.obt_mcqs').val(correct.length);

            $('.subjective_total').on('change', function () {
                var sub_total = $(this).val();
                // console.log(sub_val);
                let grand_total = $('.sub_t').val();
                $('.sub_t').val(parseInt(+sub_total) + parseInt(+grand_total));
            })

            $('.obtained_total').on('change', function () {
                var obt_total = $(this).val();
                // console.log(sub_val);
                let grand_obt_total = $('.obtained_get_total').val();
                $('.obtained_get_total').val(parseInt(+obt_total) + parseInt(+grand_obt_total));
            })

        })
    </script>
@endif
<!-- Sunny Admin App -->
<script src="{{ asset('js/template.js') }}"></script>
{{--<script src="{{ asset('js/pages/dashboard.js') }}"></script>--}}

<script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
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
</body>
</html>
