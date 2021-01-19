<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Files</title>
</head>

<body>
    <div class="container">
        @foreach ($archives as $archive)
            <pre>var_dump{{$archive->file_name}}</pre>
            <div class="d-flex justify-content-center col-lg-12 col-xl-6 py-3">
                <div class="card box-shadow  d-flex bg-danger">
                    <a href="{{$archive->file_name}}">File</a>
                    <p class="card-text text-white h5 p-2">Name: {{$archive->file_name}}</p>
                </div>
            </div>
        @endforeach
        'types' => $types, 'archives' => $archives
        <!-- @foreach($types as $type)
            <div class="d-flex justify-content-center col-lg-12 col-xl-6 py-3">
                <div class="card box-shadow  d-flex bg-danger">
                    <ul>
                        <li>
                            <a target="_blank" href="{{ url('type/'.$type->id) }}">{{$type->name}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
        @foreach($archives as $archive)
            <div class="d-flex justify-content-center col-lg-12 col-xl-6 py-3">
                <div class="card box-shadow  d-flex bg-danger">
                    <p class="card-text text-white h5 p-2">Name: {{$archive->archive_name}}</p>
                    <p class="card-text text-white h5 p-2">Created At: {{$archive->created_at}}</p>
                </div>
            </div>
        @endforeach -->
    </div>
</body>

</html> 