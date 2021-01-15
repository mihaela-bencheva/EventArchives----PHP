<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<title>Events</title>
</head>

<body>
    <pre>var_dump({{$results}})</pre>
    <div class="searchWrapper" id="searchName">
        <form action="{{ route('search-name') }}" method="GET" class="d-inline align-items-start">
            <input class="input-group-text d-inline bgRed" style="width: 40rem" type="text" name="search-name" placeholder="Event:" required/>
            <button  class="btn textRed my-3" type="submit" >Search by Event Name</button>
        </form>
    </div>
</body>

</html>