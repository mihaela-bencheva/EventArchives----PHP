<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Types</title>
</head>

<body>
    <div class="container">
        @foreach ($types as $type)
            <ul>
                <li>
                    <a target="_blank" href="{{ url('type/'.$type->id) }}">{{$type->name}}</a>
                </li>
            </ul>
        @endforeach
    </div>
</body>

</html> 