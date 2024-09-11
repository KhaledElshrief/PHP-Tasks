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
    <h1 class="m-3 text-warning">Updata Track Data</h1>

    <form class="w-75 m-auto mt-3 border p-3" action="{{ route('tracks.update', $track->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputName1" class="form-label">Name </label>
            <input type="text" class="form-control" name="name" id="exampleInputName1" value="{{ $track->name }}"
                aria-describedby="NameHelp" placeholder="{{ $track->name }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        </div>
        {{-- email --}}
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input name="description" type="input" class="form-control" placeholder="{{ $track->description }}"
                value="{{ $track->description }}">
            @error('description')
                <div class="alert
                alert-danger">{{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Track</button>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
