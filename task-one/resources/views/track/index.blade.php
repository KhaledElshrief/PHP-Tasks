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
                    <th scope="col">id</th>
                    <th scope="col">Name</th>
                    <th scope="col">description</th>
                    <th scope="col">Action</th>
                    <th scope="col">Delete</th>
                    <th scope="col">Update</th>
                </tr>
            </thead>
            <tbody>
                @if ($tracks && $tracks->count() > 0)
                    @foreach ($tracks as $track)
                        <tr>
                            <th scope="row">{{ $track['id'] }}</th>
                            <td>{{ $track['name'] }}</td>
                            <td>{{ $track['description'] }}</td>
                            <td>
                                <a href="{{ route('tracks.getTrack', $track->id) }}"><button
                                        class="btn btn-warning">Show</button></a>
                            </td>

                            <td>
                                <form action="{{ route('tracks.deleteTrack', $track->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger mt-2">Delete</button>
                                </form>
                            </td>
                            <td>
                                <div class="mt-2"> <a href="{{ route('tracks.edit', $track->id) }}"><button
                                            class="btn btn-danger mt-2">Edit</button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No data found</td>
                    </tr>
                @endif
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
