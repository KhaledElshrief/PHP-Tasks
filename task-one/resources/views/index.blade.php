<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="container" style="display:flex;alien-items:center">

        <table class="table table-bordered w-50 m-auto">
    <thead>
        <tr>
            <th scope="col">Student Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Address</th>
            <th scope="col">Track</th>
            <th scope="col">Track Description</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->gender }}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->track->name ?? 'N/A' }}</td>
                <td>{{ $student->track->description ?? 'N/A' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


        <form action="/create-track" method="get"><button class="btn btn-warning">Creat Track</button></form>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
