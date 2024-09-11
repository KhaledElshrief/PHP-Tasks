<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <form class="w-75 m-auto mt-3 border p-3" action="/store" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="exampleInputName1" class="form-label">Name </label>
        <input type="text" class="form-control" name="name" id="exampleInputName1" aria-describedby="NameHelp">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputAddress1" class="form-label">Address </label>
            <input name="address" type="text" class="form-control" id="exampleInputAddress1">

        </div>
        <label for="exampleInputImage1" class="form-label">Image </label>
        <input name="image" type="file" class="form-control" id="exampleInputImage1">
        @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value='male'>
            <label class="form-check-label" for="male">
                Male
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
            <label class="form-check-label" for="female">
                Female
            </label>
            @error('gendet')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        </div>

        <div class="mt-3">
            <select class="form-select" aria-label="Default select example" name='track_id'>
                <option disabled selected value="">Choose Student Track</option>

                @foreach ($tracks as $track)
                    <option value="{{ $track->id }}">{{ $track->name }}</option>
                @endforeach


            </select>
            @error('track_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning">Create Student</button>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
