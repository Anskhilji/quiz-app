<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Json</title>
</head>
<body>


<form action="{{route('json.multi')}}" method="POST">
    @csrf
    <div class="add_more mt-4">
        <div class="form-group col-lg-4">
            <span>Question</span>
            <input type="text" name="question[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group col-lg-4">
            <span>Ans</span>
            <input type="text" name="ans[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
    </div>

    <button type="submit" class="btn btn-primary ml-4">Submit</button>
    <a href="#" class="btn btn-warning add">Add more</a>
</form>
<div style="border:1px solid black">
{{--    {{ dd($multiplied) }}--}}
    <h2>History</h2>
    <ul>
        @foreach($data as $result)
        <li>{{ $result[0] }} : {{ $result[1] }}</li>
        @endforeach
    </ul>
</div>

<script>
    const addMore = document.querySelector('.add');
    const parent = document.querySelector('.add_more');

        addMore.addEventListener('click', function (e){
        e.preventDefault();
        let html = `
                    <div class="add_more mt-4">
                        <div class="form-group col-lg-4">
                            <span>Question</span>
                            <input type="text" name="question[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>

                    <div class="add_more mt-4">
                        <div class="form-group col-lg-4">
                            <span>Ans</span>
                            <input type="text" name="ans[]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    `;
        parent.insertAdjacentHTML('beforeend', html);

    });
</script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
