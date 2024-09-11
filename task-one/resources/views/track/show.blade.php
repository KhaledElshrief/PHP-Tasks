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
    <table class="table table-bordered w-50 m-auto">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Student</th>
                <th scope="col">name</th>
                <th scope="col">Logo</th>
                <th scope="col">Students</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <th scope="row">{{ $track['id'] }}</th>
                <td>{{ $track['name'] }}</td>
                <td>{{ $track['description'] }}</td>
                <td><img src="./../../../public/track/{{ $track['logo'] }}" alt="" srcset=""></td>
                <td> {{ $students->count() }}</td>
                <td>
                    <form action="" method="get"><button
                            class="btn btn-warning">Show</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</html>
