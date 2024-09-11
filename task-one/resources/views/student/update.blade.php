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
    <h1 class="m-3 text-warning">Edit Student Data</h1>

    <form class="w-75 m-auto mt-3 border p-3" action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        {{-- name --}}
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name </label>
            <input type="text" class="form-control" name="name" id="exampleInputName1"
                aria-describedby="NameHelp">

        </div>
        {{-- email --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>

        {{-- address --}}
        <div class="mb-3">
            <label for="exampleInputAddress1" class="form-label">Address </label>
            <input name="address" type="text" class="form-control" id="exampleInputAddress1">

        </div>
        {{-- image --}}
        <div class="mb-3">
            <label for="exampleInputImage1" class="form-label">Image address</label>
            <input name="image" type="text" class="form-control" id="exampleInputImage1">

        </div>
        {{-- gender --}}
        <div class="mb-3">
            <label for="gender" class="form-label">Gender </label>
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
            </div>

            <button type="submit" class="btn btn-primary">Edit Student Data</button>
    </form>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
