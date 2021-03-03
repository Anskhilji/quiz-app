<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Json</title>
    <link rel="stylesheet" href="{{ asset('css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/skin_color.css') }}">
</head>
<body>
<div class="container">
        <form action="" method="POST" class="form">
            @csrf
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" name="name" class="form-control n" value="" id="exampleInputname1" aria-describedby="emailHelp">
                    <span class="name_err text-danger"></span>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control n" value="" id="exampleInputemail1">
                    <span class="email_err text-danger"></span>

                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control n" value="" id="">
                    <span class="pass_err text-danger"></span>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </form>
</div>

<script src="{{ asset('js/vendors.min.js') }}"></script>
<script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js') }}"></script>
<script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>

<script src="{{ asset('js/pages/toastr.js') }}"></script>
<script src="{{ asset('js/pages/notification.js') }}"></script>
<script>
    const parentElement = document.querySelector('.form');

    parentElement.addEventListener('submit', function (e) {
        e.preventDefault();
        const dataArr = [...new FormData(this)];
        const data = Object.fromEntries(dataArr);
        // console.log(data);
        const sendFormData = async function () {
            try {
                const sendJson = await fetch(`{{route('ajax.form')}}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data),
                });
                const res = await sendJson.json();
                // console.log(JSON.parse(res));
                if (res.name){
                    document.querySelector('.name_err').innerHTML = res.name;
                }if (res.email){
                    document.querySelector('.email_err').innerHTML = res.email;

                }if (res.password){
                    document.querySelector('.pass_err').innerHTML = res.password;
                }
                if (res == 'yes'){
                    $.toast({
                        heading: 'Form submitted successfully!',
                        position: 'top-right',
                        loaderBg: '#ff6849',
                        icon: 'success',
                        hideAfter: 3500,
                        stack: 6
                    });
                }
            }catch (e) {
                window.alert(e);
            }
        }
        sendFormData();

    })
</script>

</body>
</html>
